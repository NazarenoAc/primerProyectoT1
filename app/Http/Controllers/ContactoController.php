<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
         $nombre   = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email    = $request->input('email');
        $telefono = $request->input('telefono');
        $asunto   = $request->input('asunto');
        $mensaje  = $request->input('mensaje');

        return view('exito', [
            'nombre'   => $nombre,
            'apellido' => $apellido,
            'email'    => $email,
            'telefono' => $telefono,
            'asunto'   => $asunto,
            'mensaje'  => $mensaje,
        ]);
    }
}
