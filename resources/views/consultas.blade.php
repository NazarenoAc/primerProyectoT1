@extends('layouts.app')

@section('title', 'Consultas')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <h1 class="display-4 fw-bold text-white">Envíanos tu <span style="color: #3b82f6;">Consulta</span></h1>
            <p class="text-secondary fs-5">Completa el formulario y te responderemos a la brevedad posible.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg p-4 p-md-5" style="background-color: #0f172a; border-radius: 20px;">
                <form action="{{ url('/consultas') }}" method="POST">
                    @csrf
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold">Nombre</label>
                            <input name="nombre" type="text" class="form-control custom-input" placeholder="Tu nombre">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold">Apellido</label>
                            <input name="apellido" type="text" class="form-control custom-input" placeholder="Tu apellido">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold">Email</label>
                            <input name="email" type="email" class="form-control custom-input" placeholder="email@ejemplo.com">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-white fw-semibold">Teléfono</label>
                            <input name="telefono" type="text" class="form-control custom-input" placeholder="+34 600 000 000">
                        </div>

                        <div class="col-12">
                            <label class="form-label text-white fw-semibold">Asunto</label>
                            <input name="asunto" type="text" class="form-control custom-input" placeholder="Motivo de tu consulta">
                        </div>

                        <div class="col-12">
                            <label class="form-label text-white fw-semibold">Mensaje</label>
                            <textarea name="mensaje" class="form-control custom-input" rows="4" placeholder="Escribe aquí tu consulta..."></textarea>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <span class="btn btn-primary btn-lg px-5 py-3 fw-bold rounded shadow" style="background-color: #3b82f6; border: none;">
                                Enviar Mensaje
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection