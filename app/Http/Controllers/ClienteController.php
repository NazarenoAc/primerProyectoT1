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
            ->latest()
            ->get();

        return view('cliente.pedidos', compact('pedidos'));
    }
}
