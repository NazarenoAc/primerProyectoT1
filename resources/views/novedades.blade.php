@extends('layouts.app')

@section('title', 'Novedades - Punto Electrónico')

@section('content')
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold">📰 Tablón de Novedades</h1>
            <p class="lead text-secondary">Enterate de lo último que llegó a Punto Electrónico</p>
            <hr class="my-4 w-25 mx-auto">
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-white text-start">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                        <h3 class="h4 fw-bold mb-2 mb-md-0 text-dark">
                            <i class="bi bi-phone-fill text-primary me-2"></i>iPhone 17
                        </h3>
                        <span class="badge bg-danger">Nuevo</span>
                    </div>
                    <p class="card-text text-secondary">
                        La nueva generación de iPhone llega con Dynamic Island mejorada, chip A18 Bionic y una cámara de 48 MP que redefine la fotografía móvil. Ya disponible en preventa.
                    </p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm btn-outline-primary">Agregar al carrito <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-sm bg-white text-start">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                        <h3 class="h4 fw-bold mb-2 mb-md-0 text-dark">
                            <i class="bi bi-controller text-primary me-2"></i>PlayStation 5 con Lectora
                        </h3>
                        <span class="badge bg-danger">Nuevo</span>
                    </div>
                    <p class="card-text text-secondary">
                        Disfrutá de la máxima potencia con la PlayStation 5 Slim Edición Digital + Lectora de discos externa incluida. Compatible con toda tu colección física y digital.
                    </p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm btn-outline-primary">Agregar al carrito <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-sm bg-white text-start">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                        <h3 class="h4 fw-bold mb-2 mb-md-0 text-dark">
                            <i class="bi bi-tv-fill text-primary me-2"></i>TV Samsung 72" 4K
                        </h3>
                        <span class="badge bg-success">Destacado</span>
                    </div>
                    <p class="card-text text-secondary">
                        Sumergite en una experiencia cinematográfica con el nuevo Crystal UHD de 72 pulgadas. Sonido envolvente, HDR10+ y el control remoto solar más innovador.
                    </p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm btn-outline-primary">Agregar al carrito <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-sm bg-white text-start">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                        <h3 class="h4 fw-bold mb-2 mb-md-0 text-dark">
                            <i class="bi bi-tv-fill text-primary me-2"></i>TV Samsung 72" 4K
                        </h3>
                        <span class="badge bg-success">Destacado</span>
                    </div>
                    <p class="card-text text-secondary">
                        Sumergite en una experiencia cinematográfica con el nuevo Crystal UHD de 72 pulgadas. Sonido envolvente, HDR10+ y el control remoto solar más innovador.
                    </p>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <a class="btn btn-sm btn-outline-primary">Agregar al carrito <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>       
    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <a href="{{ url('/productos') }}" class="btn btn-outline-primary btn-lg px-5">
                Ver todo el catálogo <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

@endsection