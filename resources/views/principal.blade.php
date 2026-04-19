@extends('layouts.app')

@section('title', 'Principal')

@section('content')

<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/bannerInicio.png') }}" class="d-block w-100" alt="bannerInicio">
    </div>
    <a href="/productos">
        <div class="carousel-item">
        <img src="{{ asset('images/productos.png') }}" class="d-block w-100" alt="Productos">
        </div>
    </a>
    <a href="/novedades">
    <div class="carousel-item">
      <img src="{{ asset('images/novedades.png') }}" class="d-block w-100" alt="Novedades">
    </div>
    </a>

    <a href="/ofertas">
        <div class="carousel-item">
        <img src="{{ asset('images/ofertas.png') }}" class="d-block w-100" alt="Ofertas">
        </div>
    </a>

    <a href="/quienesSomos">
        <div class="carousel-item">
        <img src="{{ asset('images/conocenos.png') }}" class="d-block w-100" alt="Conocenos">
        </div>
    </a>
    

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

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
