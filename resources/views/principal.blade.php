@extends('layouts.app')

@section('title', 'Principal')

@section('content')

<section>
    <div class="container py-4">
        <div class="row align-items-center gy-4">
            <div class="col-12 col-md-6">
                <h1 class="display-4 fw-bold text-light">El futuro<br><strong class="text-primary">en tus manos</strong></h1>
                <p class="lead text-light">Descubre la mejor selección de productos electrónicos. Smartphones, laptops, audio y mucho más con la calidad que mereces.</p>
                <a href="/productos" class="btn btn-primary">Ver productos</a>
                <a href="/contacto" class="btn btn-subtle ms-3">Contactanos</a>
            </div>

            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <div id="carouselExampleIndicators" class="carousel slide hero-carousel" data-bs-ride="carousel">
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
            </div>
        </div>
    </div>
</section>

        <section class="text-center py-5">
            <h1 class="display-5 fw-bold text-light">Bienvenidos a <strong style="color: #3b82f6;">Punto Electronico</strong></h1>
            <p class="lead text-light mx-auto" style="max-width: 720px;" >
                Tecnología accesible y diseños modernos para tu vida diaria. Auriculares, televisores, celulares y
                consolas en un solo lugar.
            </p>
        </section>

        <section id="productos" class="row g-4 mb-5">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 product-card">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold"><strong>Tecnologia de Punta</strong></h3>
                        <p class="text-light">Productos de última generación seleccionados con criterio experto.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 product-card">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold"><strong>Envio Rapido</strong></h3>
                        <p class="text-light">Entregamos en 24-48h en todo el territorio argentino.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 product-card">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold text-light"><strong>Garantia Total</strong></h3>
                        <p class="text-light">Hasta 2 años de garantía en todos nuestros equipos.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 border-0 product-card">
                    <div class="card-body">
                        <h3 class="h5 fw-semibold text-light"><strong>Soporte 24/7</strong></h3>
                        <p class="text-light">Equipo técnico disponible siempre que lo necesites.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="categorias" class="mb-5">
            <div class="container pt-4">
                <div class="text-center mb-1">
                    <h2 class="h3 fw-bold text-light">Explora por categoría</h2>
                    <p class="text-light mx-auto" style="max-width:720px;">Encuentra exactamente lo que buscas en nuestras categorías destacadas.</p>
                </div>

                <div class="row g-4 pb-5">
                    <div class="col-6 col-md-3">
                        <a href="/productos" class="text-decoration-none">
                            <div class="card h-100 border-0">
                                <div class="card-body text-center">
                                    <div class="category-icon"><i class="bi bi-phone-fill"></i></div>
                                    <h4 class="text-light">Smartphones</h4>
                                    <div class="text-light">120+ productos</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="/productos" class="text-decoration-none">
                            <div class="card h-100 border-0">
                                <div class="card-body text-center">
                                    <div class="category-icon"><i class="bi bi-laptop"></i></div>
                                    <h4 class="text-light">Laptops</h4>
                                    <div class="text-light">85+ productos</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="/productos" class="text-decoration-none">
                            <div class="card h-100 border-0">
                                <div class="card-body text-center">
                                    <div class="category-icon"><i class="bi bi-headphones"></i></div>
                                    <h4 class="text-light">Audio</h4>
                                    <div class="text-light">200+ productos</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="/productos" class="text-decoration-none">
                            <div class="card h-100 border-0">
                                <div class="card-body text-center">
                                    <div class="category-icon"><i class="bi bi-watch"></i></div>
                                    <h4 class="text-light">Wearables</h4>
                                    <div class="text-light">60+ productos</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center mt-4 border-top pt-5">
                    <h3 class="h4 fw-semibold text-light fw-bold">¿Listo para actualizarte?</h3>
                    <p class="text-light">Contáctanos hoy y descubre cómo podemos ayudarte a llevar tu tecnología al siguiente nivel.</p>
                    <a href="/contacto" class="btn btn-primary mt-2">Hacer Consulta</a>
                </div>
            </div>
        </section>

    </div>
@endsection
