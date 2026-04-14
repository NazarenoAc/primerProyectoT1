@extends('layouts.app')

@section('title', 'Éxito')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <p class="lead">
                    Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje. Un miembro del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email }}</strong> ¡Muchas gracias!
                </p>
            </div>
        </div>
    </div>
@endsection