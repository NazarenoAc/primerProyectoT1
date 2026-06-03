<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Consulta;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productos = Producto::with('categoria')->orderBy('stock')->orderBy('nombre')->get();
        $categorias = Categoria::where('activa', true)->orderBy('nombre')->get();
        $productosBajoStock = $productos->where('stock', '<=', 5);
        $consultas = Consulta::latest()->take(12)->get();
        $pedidos = Pedido::with(['producto', 'usuario.rol'])->latest()->take(12)->get();
        $ventas = Pedido::with('producto')
            ->where('tipo', 'cliente')
            ->where('estado', 'completado')
            ->get();

        $usuariosPorRol = Usuario::with('rol')
            ->get()
            ->groupBy(fn ($usuario) => $usuario->rol->nombre ?? 'sin rol')
            ->map->count();

        $metricas = [
            'productos' => $productos->count(),
            'bajo_stock' => $productosBajoStock->count(),
            'usuarios' => Usuario::count(),
            'consultas_pendientes' => Consulta::where('estado', 'pendiente')->count(),
            'pedidos_pendientes' => Pedido::where('estado', 'pendiente')->count(),
        ];

        $inicioSemana = now()->startOfWeek();
        $inicioMes = now()->startOfMonth();

        $calcularRecaudacion = fn ($pedidos) => $pedidos->sum(function ($pedido) {
            return (float) ($pedido->subtotal ?? ((float) ($pedido->producto->precio ?? 0) * $pedido->cantidad));
        });

        $ventasMetricas = [
            'ventas_semana' => $ventas->where('created_at', '>=', $inicioSemana)->count(),
            'ventas_mes' => $ventas->where('created_at', '>=', $inicioMes)->count(),
            'recaudacion_semana' => $calcularRecaudacion($ventas->where('created_at', '>=', $inicioSemana)),
            'recaudacion_mes' => $calcularRecaudacion($ventas->where('created_at', '>=', $inicioMes)),
        ];

        $ventasPorDia = collect(range(6, 0))->map(function ($diasAtras) use ($ventas, $calcularRecaudacion) {
            $fecha = now()->subDays($diasAtras);
            $ventasDelDia = $ventas->filter(fn ($pedido) => $pedido->created_at->isSameDay($fecha));

            return [
                'label' => $fecha->format('d/m'),
                'ventas' => $ventasDelDia->count(),
                'recaudacion' => $calcularRecaudacion($ventasDelDia),
            ];
        });

        $maxVentasDiarias = max(1, $ventasPorDia->max('ventas'));
        $ventasPorDia = $ventasPorDia->map(function ($dia) use ($maxVentasDiarias) {
            $dia['porcentaje'] = round(($dia['ventas'] / $maxVentasDiarias) * 100);
            return $dia;
        });

        $recaudacionPorMes = collect(range(5, 0))->map(function ($mesesAtras) use ($ventas, $calcularRecaudacion) {
            $fecha = now()->subMonths($mesesAtras);
            $ventasDelMes = $ventas->filter(function ($pedido) use ($fecha) {
                return $pedido->created_at->year === $fecha->year
                    && $pedido->created_at->month === $fecha->month;
            });

            return [
                'label' => $fecha->format('m/Y'),
                'recaudacion' => $calcularRecaudacion($ventasDelMes),
            ];
        });

        $maxRecaudacionMensual = max(1, $recaudacionPorMes->max('recaudacion'));
        $recaudacionPorMes = $recaudacionPorMes->map(function ($mes) use ($maxRecaudacionMensual) {
            $mes['porcentaje'] = round(($mes['recaudacion'] / $maxRecaudacionMensual) * 100);
            return $mes;
        });

        return view('backend.admin.adminDashboard', compact(
            'productos',
            'categorias',
            'productosBajoStock',
            'usuariosPorRol',
            'consultas',
            'pedidos',
            'metricas',
            'ventasMetricas',
            'ventasPorDia',
            'recaudacionPorMes'
        ));
    }

    public function actualizarStock(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'stock' => 'required|integer|min:0',
            'activo' => 'nullable|boolean',
        ]);

        $producto->update([
            'stock' => $validated['stock'],
            'activo' => $request->boolean('activo'),
        ]);

        return back()->with('admin_success', 'Stock actualizado correctamente.');
    }

    public function crearProducto(Request $request)
    {
        $validated = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string|max:1000',
            'precio' => 'required|numeric|min:0|max:99999999.99',
            'stock' => 'required|integer|min:0|max:99999',
            'url_imagen' => 'nullable|string|max:2048',
            'activo' => 'nullable|boolean',
        ]);

        Producto::create([
            'categoria_id' => $validated['categoria_id'],
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'precio' => $validated['precio'],
            'stock' => $validated['stock'],
            'url_imagen' => $validated['url_imagen'] ?? null,
            'activo' => $request->boolean('activo'),
        ]);

        return back()->with('admin_success', 'Producto creado correctamente.');
    }

    public function crearPedidoRestock(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1|max:9999',
            'detalle' => 'nullable|string|max:1000',
        ]);

        Pedido::create([
            'producto_id' => $validated['producto_id'],
            'tipo' => 'restock',
            'estado' => 'pendiente',
            'cantidad' => $validated['cantidad'],
            'detalle' => $validated['detalle'] ?? null,
        ]);

        return back()->with('admin_success', 'Pedido de restock creado.');
    }

    public function actualizarEstadoPedido(Request $request, Pedido $pedido)
    {
        $validated = $request->validate([
            'estado' => 'required|in:pendiente,en proceso,completado,cancelado',
        ]);

        $pedido->update($validated);

        return back()->with('admin_success', 'Estado del pedido actualizado.');
    }

    public function actualizarEstadoConsulta(Request $request, Consulta $consulta)
    {
        $validated = $request->validate([
            'estado' => 'required|in:pendiente,en revision,respondida,cerrada',
        ]);

        $consulta->update($validated);

        return back()->with('admin_success', 'Estado de la consulta actualizado.');
    }
}
