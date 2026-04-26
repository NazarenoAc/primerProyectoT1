<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Contacto')</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @yield('extra-css')
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg px-0">
    <div class="container-fluid px-2">

      
        <a class="navbar-brand me-5" href="/">
            <img src="{{ asset('images/LOGO.png') }}" width="72" height="56">
        </a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido">
            <span class="navbar-toggler-icon"></span>
        </button>

      
        <div class="collapse navbar-collapse" id="navbarContenido">

            
            <div class="navbar-nav me-auto">
                <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Principal</a>
                <a class="nav-link" href="/productos">Productos</a>
                <a class="nav-link" href="/contacto">Contacto</a>
                <a class="nav-link" href="/comercializacion">Comercializacion</a>
                <a class="nav-link" href="/quienesSomos">Quienes somos</a>
                <a class="nav-link" href="/consultas">Consultas</a>
                <a class="nav-link" href="/terminosYUsos">Terminos y Usos</a>
            </div>

            <!-- DERECHA -->
            <div class="d-flex align-items-center">
                <a class="nav-link" href="/registrarse">
                    <i class="bi bi-person-plus me-1"></i>Registrarse
                </a>
                <a class="nav-link" href="/login">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar Sesión
                </a>

                <a class="nav-link position-relative" href="/carrito">
                    <i class="bi bi-cart3"></i>
                    <span class="position-absolute top-25 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                        0
                    </span>
                </a>
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

    <footer class="text-white py-4">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                <p class="mb-0 text-white-50">© Punto Electrónico</p>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-3 mb-md-0">
                <a href="/" class="d-inline-block" aria-label="Logo">
                    <img src="{{ asset('images/LOGO.png') }}" width="60" height="50" alt="Logo" class="img-fluid">
                </a>
            </div>

            <div class="col-md-4">
                <ul class="nav justify-content-center justify-content-md-end">
                    <li class="nav-item"><a href="/productos" class="nav-link px-2 text-secondary hover-white">Productos</a></li>
                    <li class="nav-item"><a href="/comercializacion" class="nav-link px-2 text-secondary hover-white">Comercialización</a></li>
                    <li class="nav-item"><a href="/quienesSomos" class="nav-link px-2 text-secondary hover-white">Quiénes somos</a></li>
                    <li class="nav-item"><a href="/terminosYUsos" class="nav-link px-2 text-secondary hover-white">Términos y Usos</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('extra-js')
</body>
</html>
