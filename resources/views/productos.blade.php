@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1>Productos Electrónicos</h1>
            <p class="text-muted">Elige tu próximo dispositivo con las mejores ofertas y tecnología de vanguardia.</p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <!-- Inserta tu imagen aquí -->
                    <img src="{{ asset('images/producto-1.jpg') }}" class="card-img-top object-fit-cover" alt="Producto 1">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Smartphone Ultra</h5>
                    <p class="card-text text-secondary flex-grow-1">Pantalla AMOLED de 6.7", cámara triple de 108MP, batería de larga duración y carga rápida.</p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary fs-6">$799</span>
                        <a href="#" class="btn btn-outline-primary btn-sm">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <!-- Inserta tu imagen aquí -->
                    <img src="{{ asset('images/producto-2.jpg') }}" class="card-img-top object-fit-cover" alt="Producto 2">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Auriculares Wireless</h5>
                    <p class="card-text text-secondary flex-grow-1">Sonido envolvente con cancelación activa de ruido, hasta 30 horas de batería y conexión Bluetooth 5.2.</p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-success fs-6">$149</span>
                        <a href="#" class="btn btn-outline-success btn-sm">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <!-- Inserta tu imagen aquí -->
                    <img src="{{ asset('images/producto-3.jpg') }}" class="card-img-top object-fit-cover" alt="Producto 3">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Smartwatch Pro</h5>
                    <p class="card-text text-secondary flex-grow-1">Monitor de salud 24/7, GPS integrado, resistencia al agua y notificaciones inteligentes.</p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-warning text-dark fs-6">$229</span>
                        <a href="#" class="btn btn-outline-warning btn-sm">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
