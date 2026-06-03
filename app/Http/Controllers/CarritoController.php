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
            return back()->withErrors(['carrito' => 'Tu carrito esta vacio.']);
        }

        $validated = $request->validate([
            'cliente_telefono' => 'required|string|max:40',
            'envio_direccion' => 'required|string|max:255',
            'envio_ciudad' => 'required|string|max:120',
            'envio_provincia' => 'required|string|max:120',
            'envio_codigo_postal' => 'required|string|max:30',
            'metodo_pago' => 'required|in:efectivo,transferencia,tarjeta',
        ]);

        foreach ($items as $item) {
            if ($item->producto->stock < $item->cantidad) {
                return back()->withErrors(['carrito' => 'No hay stock suficiente para ' . $item->producto->nombre . '.']);
            }
        }

        DB::transaction(function () use ($items, $request, $validated) {
            foreach ($items as $item) {
                $precioUnitario = (float) $item->producto->precio;

                $pedidoData = [
                    'usuario_id' => $request->user()->id,
                    'producto_id' => $item->producto_id,
                    'tipo' => 'cliente',
                    'estado' => 'pendiente',
                    'cantidad' => $item->cantidad,
                    'detalle' => 'Pedido generado desde carrito',
                ];

                if (Schema::hasColumn('pedidos', 'cliente_nombre')) {
                    $pedidoData = array_merge($pedidoData, [
                        'cliente_nombre' => $request->user()->nombre,
                        'cliente_email' => $request->user()->email,
                        'cliente_telefono' => $validated['cliente_telefono'],
                        'envio_direccion' => $validated['envio_direccion'],
                        'envio_ciudad' => $validated['envio_ciudad'],
                        'envio_provincia' => $validated['envio_provincia'],
                        'envio_codigo_postal' => $validated['envio_codigo_postal'],
                        'metodo_pago' => $validated['metodo_pago'],
                        'precio_unitario' => $precioUnitario,
                        'subtotal' => $precioUnitario * $item->cantidad,
                    ]);
                }

                Pedido::create($pedidoData);

                $item->producto->decrement('stock', $item->cantidad);
                $item->delete();
            }
        });

        return redirect('/mis-pedidos')->with('success', 'Pedido generado correctamente.');
    }
}
