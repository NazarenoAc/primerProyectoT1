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
        
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email', 
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function autenticar(Request $request){
        $credenciales = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credenciales)){
        $request->session()->regenerate();
        if(Auth::user()->rol === 'admin'){
        return redirect('/admin');
        }}
        return redirect('/cliente');
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