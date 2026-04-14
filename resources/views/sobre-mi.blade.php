<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Mi</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <div class="navbar-nav">
        <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Inicio</a>
        <a class="nav-link {{ request()->path() == 'sobre-mi' ? 'active' : '' }}" href="/sobre-mi">Sobre Mi</a>
        <a class="nav-link {{ request()->path() == 'contactos' ? 'active' : '' }}" href="/contacto">Contacto</a>
         </div>
        </div>
        </nav>
    </header>
    <main class="flex-grow-1">
        <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                        <h1 class="card-title">Sobre mí</h1>
                        <p><b>Nombre:</b> Nazareno Acevedo Acosta</p>
                        <p><b>Edad:</b> 21 años</p>
                        <p><b>De dónde soy:</b> Corrientes, Argentina</p>
                        <p><b>Me gustaría trabajar en:</b> Desarrollo de software</p>
                        <p><b>Expectativas del curso:</b> Aprender Laravel</p>
                        <p><b>Hobbies:</b> Programar y deportes</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary mt-3">Descargar CV</a>
                    <a href="#" class="btn btn-secondary mt-3">Contactar</a>

    </main>
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 FACENA UNNE. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>