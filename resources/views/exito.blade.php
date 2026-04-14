<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>Exito</title>
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
    <main>
       <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            <p class="lead">
             Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje. Un miembro
                del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email
                }}</strong> ¡Muchas gracias!
                </p>
        </div>
    </div>
    </main>
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; 2024 FACENA UNNE. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>