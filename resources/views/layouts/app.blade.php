<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Página')</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    @yield('extra-css')
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-nav">
                    <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Principal</a>
                    <a class="nav-link {{ request()->path() == 'sobre-mi' ? 'active' : '' }}" href="/sobre-mi">Sobre Mi</a>
                    <a class="nav-link {{ request()->path() == 'contacto' ? 'active' : '' }}" href="/contacto">Contacto</a>
                    <a class="nav-link {{ request()->path() == 'comercializacion' ? 'active' : '' }}" href="/comercializacion">Comercializacion</a>
                    <a class="nav-link {{ request()->path() == 'productos' ? 'active' : '' }}" href="/productos">Productos</a>
                    <a class="nav-link {{ request()->path() == 'consultas' ? 'active' : '' }}" href="/consultas">Consultas</a>
                    <a class="nav-link {{ request()->path() == 'terminosYUsos' ? 'active' : '' }}" href="/terminosYUsos">Terminos y Usos</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-5 flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 FACENA UNNE. Todos los derechos reservados.</p>
        </div>
    </footer>

    @yield('extra-js')
</body>
</html>
