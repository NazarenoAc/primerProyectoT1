<?php

namespace App\Http\Controllers;

use App\Models\CarritoItem;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index(Request $request)
    {
        $items = CarritoItem::with('producto.categoria')
            ->where('usuario_id', $request->user()->id)
            ->get();

        $total = $items->sum(fn ($item) => $item->subtotal);

        return view('cliente.carrito', compact('items', 'total'));
    }

    public function agregar(Request $request, Producto $producto)
    {
        if (! $producto->activo || $producto->stock <= 0) {
            return back()->withErrors(['carrito' => 'El producto no esta disponible.']);
        }

        $validated = $request->validate([
            'cantidad' => 'nullable|integer|min:1|max:' . $producto->stock,
        ]);

        $cantidad = $validated['cantidad'] ?? 1;

        $item = CarritoItem::firstOrNew([
            'usuario_id' => $request->user()->id,
            'producto_id' => $producto->id,
        ]);

        $item->cantidad = min(($item->cantidad ?: 0) + $cantidad, $producto->stock);
        $item->save();

        return back()->with('success', 'Producto agregado al carrito.');
    }

    public function actualizar(Request $request, CarritoItem $item)
    {
        abort_unless($item->usuario_id === $request->user()->id, 403);

        $validated = $request->validate([
            'cantidad' => 'required|integer|min:1|max:' . $item->producto->stock,
        ]);

        $item->update($validated);

        return back()->with('success', 'Carrito actualizado.');
    }

    public function eliminar(Request $request, CarritoItem $item)
    {
        abort_unless($item->usuario_id === $request->user()->id, 403);

        $item->delete();

        return back()->with('success', 'Producto quitado del carrito.');
    }

    public function confirmar(Request $request)
{
    $items = CarritoItem::with('producto')
        ->where('usuario_id', $request->user()->id)
        ->get();

    if ($items->isEmpty()) {
        return back()->withErrors(['carrito' => 'Tu carrito está vacío.']);
    }

    // Validación base
    $rules = [
        'tipo_entrega' => 'required|in:retiro,envio',
        'cliente_telefono' => 'required|string|max:40',
        'metodo_pago' => 'required|in:efectivo,transferencia,tarjeta',
    ];

    // Si elige envío, los campos de dirección son obligatorios
    if ($request->tipo_entrega === 'envio') {
        $rules['envio_direccion'] = 'required|string|max:255';
        $rules['envio_ciudad'] = 'required|string|max:120';
        $rules['envio_provincia'] = 'required|string|max:120';
        $rules['envio_codigo_postal'] = 'required|string|max:30';
    }

    $validated = $request->validate($rules);

    // Verificar stock
    foreach ($items as $item) {
        if ($item->producto->stock < $item->cantidad) {
            return back()->withErrors(['carrito' => 'No hay stock suficiente para ' . $item->producto->nombre . '.']);
        }
    }

    DB::transaction(function () use ($items, $request, $validated) {
        foreach ($items as $item) {
            $precioUnitario = (float) $item->producto->precio;

            // Datos base del pedido
            $pedidoData = [
                'usuario_id' => $request->user()->id,
                'producto_id' => $item->producto_id,
                'tipo' => 'cliente',
                'estado' => 'pendiente',
                'cantidad' => $item->cantidad,
                'detalle' => 'Pedido generado desde carrito',
                'metodo_pago' => $validated['metodo_pago'],
                'precio_unitario' => $precioUnitario,
                'subtotal' => $precioUnitario * $item->cantidad,
            ];

            // Si tu tabla pedidos tiene columna 'tipo_entrega', agrega:
            // $pedidoData['tipo_entrega'] = $validated['tipo_entrega'];

            // Campos de cliente/dirección (si existen en la tabla)
            if (Schema::hasColumn('pedidos', 'cliente_nombre')) {
                $pedidoData['cliente_nombre'] = $request->user()->nombre;
                $pedidoData['cliente_email'] = $request->user()->email;
                $pedidoData['cliente_telefono'] = $validated['cliente_telefono'];
            }

            // ... dentro del DB::transaction en CarritoController.php
            if ($request->tipo_entrega === 'envio') {
                if (Schema::hasColumn('pedidos', 'envio_direccion')) {
                    $pedidoData['envio_direccion'] = $validated['envio_direccion'];
                    $pedidoData['envio_ciudad'] = $validated['envio_ciudad'];
                    $pedidoData['envio_provincia'] = $validated['envio_provincia'];
                    $pedidoData['envio_codigo_postal'] = $validated['envio_codigo_postal'];
                }
            } else {
                // Si es retiro, dejamos estos campos explícitamente en null
                if (Schema::hasColumn('pedidos', 'envio_direccion')) {
                    $pedidoData['envio_direccion'] = null;
                    $pedidoData['envio_ciudad'] = null;
                    $pedidoData['envio_provincia'] = null;
                    $pedidoData['envio_codigo_postal'] = null;
                }
            }

            Pedido::create($pedidoData);

            $item->producto->decrement('stock', $item->cantidad);
            $item->delete();
        }
    });

    return redirect('/mis-pedidos')->with('success', 'Pedido generado correctamente.');
}
}
