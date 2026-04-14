@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Contacto</h1>
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Formulario de contacto</h2>
                    <form action="{{ url('/contacto') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="Ingrese su nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Ingrese su email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mensaje</label>
                            <textarea name="mensaje" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection