<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; // Ya que estás, agrega el de Admin también
Route::get('/', function () {
    return view('principal');
});

Route::get('/quienesSomos', function () {
    return view('quienesSomos');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/exito', function () {
    return view('exito');
});

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/productos', function () {
    return view('productos');
});


Route::get('/consultas', function () {
    return view('consultas');
});
Route::post('/consultas', [ContactoController::class, 'procesar']);

Route::get('/terminosYUsos', function () {
    return view('terminosYUsos');
});

Route::get('/registrarse', [AuthController::class, 'formularioRegistro']);
Route::post('/registrarse', [AuthController::class, 'registrar']);

Route::get('/login', [AuthController::class, 'formularioLogin']);

// ◄--- ¡ESTA ES LA QUE TE FALTA AGREGAR! (Procesa el formulario)
Route::post('/login', [AuthController::class, 'autenticar']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'rol:admin'])->group(function (){
    Route::get('/admin', [AdminController::class, 'dashboard']);
});

Route::get('/novedades', function () {
    return view('novedades');
});