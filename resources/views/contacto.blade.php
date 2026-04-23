@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fade-in-up">Contacto</h1>
    
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4">
                        <i class="bi bi-building me-2"></i>Información de la Empresa
                    </h3>
                    
                    <dl class="row">
                        <dt class="col-sm-4">Titulares:</dt>
                        <dd class="col-sm-8">
                            Benitez Vallejos Nicolas<br>
                            Acevedo Acosta Nazareno</span>
                        </dd>
                        
                        <dt class="col-sm-4">Razón Social:</dt>
                        <dd class="col-sm-8">Punto Electrónico S.R.L.</dd>
                        
                        <dt class="col-sm-4">Domicilio Legal:</dt>
                        <dd class="col-sm-8">hola</dd>
                        
                        <dt class="col-sm-4">Teléfonos:</dt>
                        <dd class="col-sm-8">
                            +54 9 3794949990</a> / 
                            +54 9 3794540426</a>
                        </dd>
                                                
                        <dt class="col-sm-4">Correo Electrónico:</dt>
                        <dd class="col-sm-8">
                            <a href="mailto:puntoelectr@gmail.com" class="text-white text-decoration-none">
                                puntoelectr@gmail.com
                            </a>
                        </dd>
                        
                        <dt class="col-sm-4">Horario de Atención:</dt>
                        <dd class="col-sm-8">Lunes a Viernes de 7:00 a 19:00 hs</dd>
                    </dl>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title mb-4">
                        <i class="bi bi-chat-dots me-2"></i>¿Necesitás asesoramiento personalizado?
                    </h3>
                    <p class="lead mb-4">Completá nuestro formulario de consultas y un representante se pondrá en contacto a la brevedad.</p>
                    
                    <div class="mt-auto">
                        <a href="{{ url('/consultas') }}" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="bi bi-pencil-square me-2"></i>Ir al formulario de consultas
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4">
                        <i class="bi bi-geo-alt me-2"></i>Nuestra Ubicación
                    </h3>
                    <div class="ratio ratio-21x9">
                        <iframe 
                            src="hola" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection