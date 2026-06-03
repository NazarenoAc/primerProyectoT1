<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rol;
use App\Models\Usuario;

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

        $rolCliente = Rol::firstOrCreate([
            'nombre' => 'cliente'
        ]);

        $usuario = Usuario::create([
            'nombre'   => $validated['nombre'],
            'email'    => $validated['email'],
            'password' => $validated['password'],
            'rol_id'   => $rolCliente->id,
        ]);

        Auth::login($usuario);

        return redirect('/')->with('success', 'Usuario registrado exitosamente');
    }

    public function autenticar(Request $request)
    {
        $credenciales = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->rol && Auth::user()->rol->nombre === 'admin') {
                return redirect('/admin');
            }

            return redirect('/')->with('success', 'Iniciaste sesión exitosamente');
        }

        return back()->withErrors([
            'email' => 'Email o contraseña incorrectos',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
