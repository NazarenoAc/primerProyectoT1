<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formularioRegistro()
    {
        return view('backend.usuarios.registro');
    }

    public function formularioLogin()
    {
        return view('backend.usuarios.login'); 
    }

    public function registrar(Request $request)
    {
        
        $validated = $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email', 
            'password' => 'required|min:6|confirmed',
        ]);

        // Obtener el rol de cliente
        $rolCliente = \App\Models\Rol::where('nombre', 'cliente')->first();
        
        // Crear el usuario con rol de cliente
        $usuario = \App\Models\Usuario::create([
            'nombre'   => $validated['nombre'],
            'email'    => $validated['email'],
            'password' => $validated['password'], // Se hashea automáticamente por el casting
            'rol_id'   => $rolCliente->id,
        ]);

        // Autenticar al usuario después del registro
        Auth::login($usuario);

        return redirect('/')->with('success', 'Usuario registrado exitosamente');
    }

    public function autenticar(Request $request){
        $credenciales = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            if(Auth::user()->rol()->first()->nombre === 'admin'){
                return redirect('/');
            }
            return redirect('/')->with('success', 'Iniciaste sesión exitosamente');
        }
        return back()->withErrors([ 'email' => 'Email o contraseña incorrectos' ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}