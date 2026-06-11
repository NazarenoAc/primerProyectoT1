<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class ClienteController extends Controller
{
    public function pedidos(Request $request)
    {
        $pedidos = Pedido::with('producto')
            ->where('usuario_id', $request->user()->id)
            ->orderByDesc('created_at')
            ->get();

        // Agrupar por orden_id cuando exista, sino por fecha
        $agrupados = $pedidos->groupBy(function ($pedido) {
            return $pedido->orden_id ?? $pedido->created_at->format('Y-m-d-H:i:s');
        });

        $ordenes = collect();
        foreach ($agrupados as $grupo) {
            $primer = $grupo->first();
            $total = $grupo->sum(function ($p) {
                return (float) ($p->subtotal ?? ((float) ($p->producto->precio ?? 0) * $p->cantidad));
            });

            $ordenes->push((object) [
                'id' => $primer->id,
                'orden_id' => $primer->orden_id,
                'created_at' => $primer->created_at,
                'estado' => $primer->estado,
                'metodo_pago' => $primer->metodo_pago,
                'total' => $total,
                'productos_items' => $grupo,
            ]);
        }

        return view('cliente.pedidos', compact('ordenes'));
    }
}
