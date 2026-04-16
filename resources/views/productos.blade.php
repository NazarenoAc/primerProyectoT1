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
                    <img src="{{ asset('https://imgs.search.brave.com/hQqyKoMen0Er1pUowGDd0nU6pjNfLBGNTFiBuN06pYU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/YW5kcm9pZGhlYWRs/aW5lcy5jb20vd3At/Y29udGVudC91cGxv/YWRzLzIwMjUvMDEv/U2Ftc3VuZy1HYWxh/eHktUzI1LW9mZmlj/aWFsLXJlbmRlci0x/LTE0MjB4MTQyMC53/ZWJw') }}" class="card-img-top object-fit-cover" alt="Smartphone Samsung Galaxy S25">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Smartphone Samsung Galaxy S25</h5>
                    <p class="card-text text-secondary flex-grow-1">El Samsung Galaxy S25 combina potencia y elegancia con una pantalla AMOLED vibrante, alto rendimiento y cámaras avanzadas para capturar cada momento con calidad. Ideal para uso diario, entretenimiento y fotografía..</p>
                    <a href="#features-samsung" class="btn btn-link text-decoration-none p-0" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="features-samsung">Ver mas</a>
                    <div class="collapse mt-3" id="features-samsung">
                        <ul class="list-unstyled mb-0 small text-muted">
                            <li> Pantalla AMOLED 6.2" Full HD+ 120Hz</li>
                            <li> Procesador de alto rendimiento</li>
                            <li> Cámara principal de alta resolución</li>
                            <li> Cámara frontal optimizada</li>
                            <li>Batería de larga duración</li>
                            <li> 12GB RAM y almacenamiento amplio</li>
                            <li> Resistencia al agua (IP68)</li>
                            <li> Conectividad 5G</li>
                        </ul>
                    </div>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary fs-6">$799</span>
                        <a href="#" class="btn btn-outline-primary btn-sm">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/rzB8bbLCfu9mEVCMg9Pk_n7d5giPtbJcxNeUi4fvGdY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjFYdkhPdjQ0ZEwu/anBn') }}" class="card-img-top object-fit-cover" alt="Auriculares Wireless JBL Vibe buds 2">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Auriculares Wireless</h5>
                    <p class="card-text text-secondary flex-grow-1">Sonido envolvente con cancelación activa de ruido, hasta 30 horas de batería y conexión Bluetooth 5.2.</p>
                    <a href="#" class="btn btn-link text-decoration-none p-0 ver-mas">Ver mas</a>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-success fs-6">$149</span>
                        <a href="#" class="btn btn-outline-success btn-sm">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/tsBSTcTbgkxEU0q-i0wr7HV0p0VikKvtyxGKsuLHF6U/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9odHRw/Mi5tbHN0YXRpYy5j/b20vRF9RX05QXzJY/XzkwNDM0MS1NTEIx/MDU5MDA1ODc5Mzhf/MDIyMDI2LUUud2Vi/cA') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Smartwatch Pro</h5>
                    <p class="card-text text-secondary flex-grow-1">Monitor de salud 24/7, GPS integrado, resistencia al agua y notificaciones inteligentes.</p>
                    <a href="#" class="btn btn-link text-decoration-none p-0 ver-mas">Ver mas</a>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <span class="badge bg-warning text-dark fs-6">$229</span>
                        <a href="#" class="btn btn-outline-warning btn-sm">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

