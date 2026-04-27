@extends('layouts.app')

@section('title', 'Éxito')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-5 text-center">
                <h2 class="mb-4">✅ ¡Mensaje enviado con éxito!</h2>
                <p class="lead">
                    Hola <strong>{{ $nombre }} {{ $apellido }}</strong>, qué bueno recibir tu mensaje.
                </p>
                <p>Un miembro de nuestro equipo se pondrá en contacto con vos al correo <strong>{{ $email }}</strong> o al teléfono <strong>{{ $telefono }}</strong>.</p>
                <p class="text-white-50"><small>Asunto: {{ $asunto }}</small></p>
                <a href="/" class="btn btn-outline-light mt-3">Volver al inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection