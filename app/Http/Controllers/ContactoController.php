<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:120',
            'apellido' => 'nullable|string|max:120',
            'email' => 'required|email|max:180',
            'telefono' => 'nullable|string|max:60',
            'asunto' => 'required|string|max:180',
            'mensaje' => 'required|string|max:3000',
        ]);

        $consulta = Consulta::create($validated);

        return view('exito', [
            'nombre' => $consulta->nombre,
            'apellido' => $consulta->apellido,
            'email' => $consulta->email,
            'telefono' => $consulta->telefono,
            'asunto' => $consulta->asunto,
            'mensaje' => $consulta->mensaje,
        ]);
    }
}
