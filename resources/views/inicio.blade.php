<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
    <main class="py-5 flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 text-center mb-4">Bienvenidos a mi Página Web</h1>
                    <p class="lead text-center">Este es el contenido principal de la página de inicio.</p>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 FACENA UNNE. Todos los derechos reservados.</p>
        </div>
        
    </footer>
</body>
</html>