<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
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
            <h1>Contacto</h1>
             <div class="card mt-4">
        <div class="card-body">
        <h2>Formulario de contacto</h2>
        <form action="{{ url('/contacto') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control" placeholder="Ingrese su
        nombre">
        </div>
        <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" placeholder="Ingrese su
        email">
        </div>
        <div class="mb-3">
        <label class="form-label">Mensaje</label>
        <textarea name="mensaje" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">
        Enviar mensaje
        </button>
        </form>
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