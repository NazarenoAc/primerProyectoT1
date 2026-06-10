<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Punto Electronico')</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('extra-css')
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                    <img src="{{ asset('images/LOGO.png') }}" width="66" height="52" alt="Punto Electronico">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Abrir menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContenido">
                    <div class="navbar-nav navbar-main mx-lg-auto">
                        <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Principal</a>
                        <a class="nav-link {{ request()->is('productos') ? 'active' : '' }}" href="/productos">Productos</a>
                        <a class="nav-link {{ request()->is('contacto') ? 'active' : '' }}" href="/contacto">Contacto</a>
                        <a class="nav-link {{ request()->is('comercializacion') ? 'active' : '' }}" href="/comercializacion">Comercializacion</a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('quienesSomos') || request()->is('consultas') || request()->is('terminosYUsos') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/quienesSomos">Quienes somos</a></li>
                                <li><a class="dropdown-item" href="/consultas">Consultas</a></li>
                                <li><a class="dropdown-item" href="/terminosYUsos">Terminos y Usos</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="navbar-actions d-flex align-items-lg-center gap-3 mt-3 mt-lg-0">
                        @auth
                            @if(! auth()->user()->rol || auth()->user()->rol->nombre !== 'admin')
                                <a href="#carritoOffcanvas" data-bs-toggle="offcanvas" aria-controls="carritoOffcanvas" class="header-cart text-decoration-none" style="cursor: pointer;">
                                    <i class="bi bi-cart3"></i>
                                    <strong>{{ $cartCount ?? 0 }}</strong>
                                </a>
                            @endif

                            <div class="dropdown user-menu">
                                <button class="btn user-menu-toggle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="user-avatar">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <span class="user-menu-name">{{ auth()->user()->nombre }}</span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                    @if(auth()->user()->rol && auth()->user()->rol->nombre === 'admin')
                                        <li>
                                            <a class="dropdown-item" href="/admin">
                                                <i class="bi bi-speedometer2 me-2"></i>Panel de Gestion
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-item" href="/mis-pedidos">
                                                <i class="bi bi-bag-check me-2"></i>Mis pedidos
                                            </a>
                                        </li>
                                    @endif

                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="/logout" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesion
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a class="btn btn-subtle" href="/registrarse">
                                <i class="bi bi-person-plus me-1"></i>Registrarse
                            </a>
                            <a class="btn btn-primary btn-login" href="/login">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar sesion
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-5 flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @unless(request()->is('admin') || request()->is('adminDashboard'))
        <footer class="site-footer footer-links">
            <div class="container">
                <div class="row g-4 align-items-start">
                    <div class="col-lg-4">
                        <a href="/" class="footer-brand d-inline-flex align-items-center gap-3 text-decoration-none">
                            <img src="{{ asset('images/LOGO.png') }}" width="64" height="52" alt="Punto Electronico">
                            <span>Punto Electronico</span>
                        </a>
                        <p class="footer-copy mt-3 mb-0">
                            Tecnologia seleccionada, soporte cercano y soluciones para actualizar tu dia a dia.
                        </p>
                    </div>

                    <div class="col-6 col-lg-2">
                        <h2 class="footer-title">Tienda</h2>
                        <nav class="footer-nav">
                            <a href="/productos">Productos</a>
                            <a href="/comercializacion">Comercializacion</a>
                            <a href="/contacto">Contacto</a>
                        </nav>
                    </div>

                    <div class="col-6 col-lg-3">
                        <h2 class="footer-title">Empresa</h2>
                        <nav class="footer-nav">
                            <a href="/quienesSomos">Quienes somos</a>
                            <a href="/consultas">Consultas</a>
                            <a href="/terminosYUsos">Terminos y Usos</a>
                        </nav>
                    </div>

                    <div class="col-lg-3">
                        <h2 class="footer-title">Redes</h2>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/puntoelectronic" aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/puntoelectronic" aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </div>
                        <p class="footer-copy mt-3 mb-0">Corrientes, Argentina</p>
                    </div>
                </div>

                <div class="footer-bottom">
                    <span>Punto Electronico</span>
                    <span>Atencion y tecnologia con respaldo.</span>
                </div>
            </div>
        </footer>
    @endunless

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('extra-js')

    <div class="offcanvas offcanvas-end" tabindex="-1" id="carritoOffcanvas" aria-labelledby="carritoOffcanvasLabel" style="width: 400px; border-left: none; box-shadow: -5px 0 15px rgba(0,0,0,0.05);">
    
    <div class="offcanvas-header pb-2">
        <h2 class="offcanvas-title fw-semibold fs-4" id="carritoOffcanvasLabel">Mi bolsa</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column p-0">
        <div class="cart-items px-3 py-2 flex-grow-1" style="overflow-y: auto;">
            
            @if(isset($cartItems) && $cartItems->isNotEmpty())
                @foreach($cartItems as $item)
                    @php
                        $fallbackPorCategoria = match ($item->producto->categoria->nombre ?? '') {
                            'Smartphones' => asset('images/novedades.png'),
                            'Computadoras' => asset('images/productos.png'),
                            'Audio' => asset('images/ofertas.png'),
                            'TV y Monitores' => asset('images/bannerInicio.png'),
                            'Wearables' => asset('images/conocenos.png'),
                            default => asset('images/productos.png'),
                        };

                        $imagenProducto = $item->producto->url_imagen
                            ? (\Illuminate\Support\Str::startsWith($item->producto->url_imagen, ['http://', 'https://'])
                                ? $item->producto->url_imagen
                                : asset($item->producto->url_imagen))
                            : $fallbackPorCategoria;
                    @endphp

                    <div class="d-flex gap-3 mb-4 pb-3 border-bottom position-relative">
                        
                        <div style="width: 80px; height: 100px; flex-shrink: 0; background-color: #f8f9fa; border-radius: 4px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ $imagenProducto }}" alt="{{ $item->producto->nombre }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.onerror=null;this.src='{{ $fallbackPorCategoria }}';">
                        </div>

                        <div class="d-flex flex-column w-100 pt-1">
                            
                            <div class="d-flex justify-content-between align-items-start">
                                <h6 class="mb-1 text-uppercase fw-normal" style="font-size: 0.85rem; padding-right: 25px; line-height: 1.4;">
                                    {{ $item->producto->nombre }}
                                </h6>
                                
                                <form action="{{ route('carrito.eliminar', $item) }}" method="POST" class="position-absolute top-0 end-0 mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 text-secondary" title="Quitar">
                                        <i class="bi bi-trash3 fs-5"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <div class="fw-bold fs-6 mt-1">
                                ${{ number_format($item->subtotal, 2, ',', '.') }}
                            </div>

                            <div class="mt-auto d-flex justify-content-end">
                                <div class="d-flex align-items-center border rounded-pill px-2 py-1" style="background: #fff; width: fit-content;">
                                    <form action="{{ route('carrito.actualizar', $item) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="cantidad" value="{{ max(1, $item->cantidad - 1) }}">
                                        <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none p-0 px-2 fw-bold" style="font-size: 1.1rem;" @disabled($item->cantidad <= 1)>-</button>
                                    </form>
                                    
                                    <span class="mx-2 fw-semibold" style="font-size: 0.95rem;">{{ $item->cantidad }}</span>
                                    
                                    <form action="{{ route('carrito.actualizar', $item) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="cantidad" value="{{ min($item->producto->stock, $item->cantidad + 1) }}">
                                        <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none p-0 px-2 fw-bold" style="font-size: 1.1rem;" @disabled($item->cantidad >= $item->producto->stock)>+</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5 mt-5 text-secondary">
                    <i class="bi bi-bag-x fs-1 d-block mb-3"></i>
                    <p class="fs-5">Tu carrito está vacío</p>
                </div>
            @endif
        </div>

        @if(isset($cartItems) && $cartItems->isNotEmpty())
            <div class="p-4 bg-white mt-auto border-top">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="fw-bold fs-5">Subtotal</span>
                    <span class="fw-bold fs-5">${{ number_format($cartTotal ?? 0, 2, ',', '.') }}</span>
                </div>
                
                <a href="/carrito" class="btn text-white w-100 fw-bold py-3 fs-5" style="background-color: #000; border-radius: 8px;">
                    Iniciar compra
                </a>
            </div>
        @endif
    </div>
</div>

</body>
</html>
