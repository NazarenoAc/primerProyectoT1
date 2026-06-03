<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController;

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

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/consultas', function () {
    return view('consultas');
});
Route::post('/consultas', [ContactoController::class, 'procesar']);

Route::get('/terminosYUsos', function () {
    return view('terminosYUsos');
});

Route::get('/registrarse', [AuthController::class, 'formularioRegistro']);
Route::post('/registrarse', [AuthController::class, 'registrar']);

Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::patch('/carrito/{item}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/{item}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');
    Route::get('/mis-pedidos', [ClienteController::class, 'pedidos'])->name('cliente.pedidos');
});

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/adminDashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/productos', [AdminController::class, 'crearProducto'])->name('admin.productos.crear');
    Route::patch('/admin/productos/{producto}/stock', [AdminController::class, 'actualizarStock'])->name('admin.productos.stock');
    Route::post('/admin/pedidos/restock', [AdminController::class, 'crearPedidoRestock'])->name('admin.pedidos.restock');
    Route::patch('/admin/pedidos/{pedido}/estado', [AdminController::class, 'actualizarEstadoPedido'])->name('admin.pedidos.estado');
    Route::patch('/admin/consultas/{consulta}/estado', [AdminController::class, 'actualizarEstadoConsulta'])->name('admin.consultas.estado');
});

Route::get('/novedades', function () {
    return view('novedades');
});
