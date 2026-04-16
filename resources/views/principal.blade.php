@extends('layouts.app')

@section('title', 'principal')

@section('content')

        <section class="text-center py-5">
            <h1 class="display-5 fw-bold">Bienvenidos a <strong>Punto Electronico</strong></h1>
            <p class="lead text-muted mx-auto" style="max-width: 720px;">
                Tecnología accesible y diseños modernos para tu vida diaria. Auriculares, televisores, celulares y
                consolas en un solo lugar.
            </p>
        </section>

        <section id="productos" class="row g-4 mb-5">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold">Auriculares</h3>
                        <p class="text-muted">Sonido nítido, comodidad prolongada y conectividad actual para tus momentos de ocio.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold">Televisores</h3>
                        <p class="text-muted">Pantallas con alta definición y buen brillo para ver películas, series y juegos con estilo.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold">Celulares</h3>
                        <p class="text-muted">Modelos modernos y funcionales para comunicación, entretenimiento y productividad diaria.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold">Consolas</h3>
                        <p class="text-muted">Entretenimiento para toda la familia con consolas y accesorios de última generación.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="servicios" class="row align-items-center g-4 mb-5">
            <div class="col-lg-6">
                <h2 class="h4 fw-semibold">Qué ofrecemos</h2>
                <p class="text-muted">
                    Asesoría personalizada, selección de productos tecnológicos y un servicio claro y confiable para que
                    encuentres justo lo que buscas.
                </p>
                <ul class="list-unstyled text-muted">
                    <li>• Atención dedicada para cada cliente</li>
                    <li>• Productos seleccionados por calidad y precio</li>
                    <li>• Entrega rápida y soporte luego de la compra</li>
                </ul>
            </div>
            
        </section>

        <section id="contacto" class="text-center py-4">
            <p class="mb-3 text-muted">Explora nuestra selección y encuentra el producto tecnológico ideal.</p>
            <a href="/productos" class="btn btn-primary btn-lg">Ver productos</a>
        </section>
    </div>
@endsection