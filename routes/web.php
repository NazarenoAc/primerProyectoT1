<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('principal');
});

Route::get('/quienesSomos', function () {
    return view('quienesSomos');
});

Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/contacto', [ContactoController::class, 'procesar']);


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

Route::get('/terminosYUsos', function () {
    return view('terminosYUsos');
});

Route::get('/registrarse', function () {
    return view('registrarse');
});
