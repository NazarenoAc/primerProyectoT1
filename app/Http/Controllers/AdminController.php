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

        // Agrupar pedidos de cliente por usuario y fecha para formar órdenes de compra
        $ventasAgrupadas = collect();
        $pedidosCliente = Pedido::with(['producto', 'usuario'])
            ->where('tipo', 'cliente')
            ->orderByDesc('created_at')
            ->get()
            ->groupBy(function ($pedido) {
                if (!empty($pedido->orden_id)) {
                    return $pedido->orden_id;
                }
                $fecha = $pedido->created_at->format('Y-m-d');
                $usuarioId = $pedido->usuario_id ?? 'anonimo';
                return "{$usuarioId}-{$fecha}";
            });

        foreach ($pedidosCliente as $grupo) {
            $primerPedido = $grupo->first();
            $total = $grupo->sum(function ($p) {
                return (float) ($p->subtotal ?? ((float) ($p->producto->precio ?? 0) * $p->cantidad));
            });

            $ventasAgrupadas->push((object) [
                'id' => $primerPedido->id,
                'usuario_id' => $primerPedido->usuario_id,
                'usuario' => $primerPedido->usuario,
                'cliente_nombre' => $primerPedido->cliente_nombre ?? optional($primerPedido->usuario)->nombre,
                'cliente_email' => $primerPedido->cliente_email ?? optional($primerPedido->usuario)->email,
                'cliente_telefono' => $primerPedido->cliente_telefono,
                'envio_direccion' => $primerPedido->envio_direccion,
                'envio_ciudad' => $primerPedido->envio_ciudad,
                'envio_provincia' => $primerPedido->envio_provincia,
                'envio_codigo_postal' => $primerPedido->envio_codigo_postal,
                'metodo_pago' => $primerPedido->metodo_pago,
                'estado' => $primerPedido->estado,
                'created_at' => $primerPedido->created_at,
                'total' => $total,
                'productos_items' => $grupo,
            ]);
        }

        $usuariosPorRol = Usuario::with('rol')
            ->get()
            ->groupBy(fn ($usuario) => $usuario->rol->nombre ?? 'sin rol')
            ->map->count();

        $pedidosPendientes = Pedido::where('tipo', 'cliente')
            ->where('estado', 'pendiente')
            ->get()
            ->groupBy(function ($pedido) {
                $fecha = $pedido->created_at->format('Y-m-d');
                $usuarioId = $pedido->usuario_id ?? 'anonimo';
                return "{$usuarioId}-{$fecha}";
            })
            ->count();

        $metricas = [
            'productos' => $productos->count(),
            'bajo_stock' => $productosBajoStock->count(),
            'usuarios' => Usuario::count(),
            'consultas_pendientes' => Consulta::where('estado', 'pendiente')->count(),
            'pedidos_pendientes' => $pedidosPendientes,
        ];

        $inicioSemana = now()->startOfWeek();
        $inicioMes = now()->startOfMonth();

        $calcularRecaudacion = fn ($pedidos) => $pedidos->sum(function ($pedido) {
            return (float) ($pedido->subtotal ?? ((float) ($pedido->producto->precio ?? 0) * $pedido->cantidad));
        });

        $ventasSemanaCollection = $ventas->where('created_at', '>=', $inicioSemana);
        $ventasMesCollection = $ventas->where('created_at', '>=', $inicioMes);

        $cantVentasSemana = $ventasSemanaCollection->groupBy(function ($pedido) {
            if (!empty($pedido->orden_id)) {
                return $pedido->orden_id;
            }
            $fecha = $pedido->created_at->format('Y-m-d');
            $usuarioId = $pedido->usuario_id ?? 'anonimo';
            return "{$usuarioId}-{$fecha}";
        })->count();

        $cantVentasMes = $ventasMesCollection->groupBy(function ($pedido) {
            if (!empty($pedido->orden_id)) {
                return $pedido->orden_id;
            }
            $fecha = $pedido->created_at->format('Y-m-d');
            $usuarioId = $pedido->usuario_id ?? 'anonimo';
            return "{$usuarioId}-{$fecha}";
        })->count();

        $ventasMetricas = [
            'ventas_semana' => $cantVentasSemana,
            'ventas_mes' => $cantVentasMes,
            'recaudacion_semana' => $calcularRecaudacion($ventasSemanaCollection),
            'recaudacion_mes' => $calcularRecaudacion($ventasMesCollection),
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
            'ventasAgrupadas',
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

        if ($pedido->tipo === 'cliente' && ! empty($pedido->orden_id)) {
            Pedido::where('orden_id', $pedido->orden_id)
                ->where('tipo', 'cliente')
                ->update(['estado' => $validated['estado']]);
        } else {
            $pedido->update(['estado' => $validated['estado']]);
        }

        return back()->with('admin_success', 'Estado de la orden actualizado correctamente.');
    }

    public function actualizarEstadoConsulta(Request $request, Consulta $consulta)
    {
        $validated = $request->validate([
            'estado' => 'required|in:pendiente,en revision,respondida,cerrada',
        ]);

        $consulta->update($validated);

        return back()->with('admin_success', 'Estado de la consulta actualizado.');
    }

    public function obtenerDetallePedido(Pedido $pedido)
    {
        $metodosPago = [
            'efectivo' => 'Efectivo al retirar',
            'transferencia' => 'Mercado Pago',
            'tarjeta' => 'Tarjeta debito/credito',
        ];

        // Obtener todos los pedidos del mismo usuario en la misma fecha
        $fecha = $pedido->created_at->format('Y-m-d');
        $usuarioId = $pedido->usuario_id;
        
        if (!empty($pedido->orden_id)) {
            $pedidosDelMismoGrupo = Pedido::with('producto')
                ->where('orden_id', $pedido->orden_id)
                ->where('tipo', 'cliente')
                ->get();
        } else {
            $pedidosDelMismoGrupo = Pedido::with('producto')
                ->where('usuario_id', $usuarioId)
                ->whereDate('created_at', $fecha)
                ->where('tipo', 'cliente')
                ->get();
        }

        // Si no hay agrupación, usar el pedido actual
        if ($pedidosDelMismoGrupo->isEmpty()) {
            $pedidosDelMismoGrupo = collect([$pedido]);
        }

        $primerPedido = $pedidosDelMismoGrupo->first();
        $total = $pedidosDelMismoGrupo->sum(function ($p) {
            return (float) ($p->subtotal ?? ((float) ($p->producto->precio ?? 0) * $p->cantidad));
        });

        $productos = $pedidosDelMismoGrupo->map(function ($p) {
            $precioUnitario = $p->producto->precio ?? 0;
            $subtotal = $p->subtotal ?? ($precioUnitario * $p->cantidad);
            return [
                'nombre' => $p->producto->nombre ?? 'Sin producto',
                'cantidad' => $p->cantidad,
                'precio' => '$' . number_format($precioUnitario, 2, ',', '.'),
                'total' => '$' . number_format($subtotal, 2, ',', '.'),
            ];
        })->toArray();

        $esRetiro = empty($primerPedido->envio_direccion)
            && empty($primerPedido->envio_ciudad)
            && empty($primerPedido->envio_provincia)
            && empty($primerPedido->envio_codigo_postal);

        return response()->json([
            'id' => $pedido->id,
            'fecha' => $primerPedido->created_at->format('d/m/Y H:i'),
            'cliente_nombre' => $primerPedido->cliente_nombre ?? optional($primerPedido->usuario)->nombre,
            'cliente_email' => $primerPedido->cliente_email ?? optional($primerPedido->usuario)->email,
            'cliente_telefono' => $primerPedido->cliente_telefono,
            'envio_direccion' => $primerPedido->envio_direccion,
            'envio_ciudad' => $primerPedido->envio_ciudad,
            'envio_provincia' => $primerPedido->envio_provincia,
            'envio_codigo_postal' => $primerPedido->envio_codigo_postal,
            'es_retiro' => $esRetiro,
            'metodo_pago' => $metodosPago[$primerPedido->metodo_pago] ?? ($primerPedido->metodo_pago ?? 'Sin definir'),
            'estado' => ucfirst($primerPedido->estado),
            'total' => '$' . number_format($total, 2, ',', '.'),
            'productos' => $productos
        ]);
    }
}
