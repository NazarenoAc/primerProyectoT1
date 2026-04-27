@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="mb-3 text-light">
        Información de <span style="color:#2ea3f2;">Contacto</span>
    </h1>
    <p class="text-light">
        Estamos aquí para ayudarte. Elegí el canal que prefieras.
    </p>
</div>
    
<div class="row g-4 justify-content-center">

    
    <div class="col-12 col-md-6 col-lg-3">
        <div class="contact-card">
            <div class="icon-box">
                <i class="bi bi-geo-alt"></i>
            </div>
            <h5>Dirección</h5>
            <p>Facena UNNE<br>Corrientes, Corrientes</p>
        </div>
    </div>

    
    <div class="col-12 col-md-6 col-lg-3">
        <div class="contact-card">
            <div class="icon-box">
                <i class="bi bi-telephone"></i>
            </div>
            <h5>Teléfono</h5>
            <p>+54 9 379 4540426<br>+54 9 379 4949990</p>
        </div>
    </div>

   
    <div class="col-12 col-md-6 col-lg-3">
        <div class="contact-card">
            <div class="icon-box">
                <i class="bi bi-envelope"></i>
            </div>
            <h5>Email</h5>
            <p>info@puntoElectronico.com<br>ventas@puntoElectronico.com</p>
        </div>
    </div>

   
    <div class="col-12 col-md-6 col-lg-3">
        <div class="contact-card">
            <div class="icon-box">
                <i class="bi bi-clock"></i>
            </div>
            <h5>Horario</h5>
            <p>Lun - Vie: 9:00 - 20:00<br>Sáb: 10:00 - 14:00</p>
        </div>
    </div>
</div>

        
       <div class="row mt-5 g-4">

    <!-- IZQUIERDA: ASESORAMIENTO -->
    <div class="col-lg-6">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex flex-column">
                <h3 class="card-title mb-4">
                    <i class="bi bi-chat-dots me-2"></i>
                    ¿Necesitás asesoramiento personalizado?
                </h3>

                <p class="mb-4">
                    Completá nuestro formulario de consultas y un representante se pondrá en contacto a la brevedad.
                </p>

                <div class="mt-auto">
                    <a href="{{ url('/consultas') }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square me-2"></i>
                        Ir al formulario de consultas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- DERECHA: MAPA -->
    <div class="col-lg-6">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-4">
                    <i class="bi bi-geo-alt me-2"></i>
                    Nuestra Ubicación
                </h3>

                <div class="ratio ratio-16x9">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d885.0206349300204!2d-58.832957330456395!3d-27.466689598520073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d11ee93d%3A0x597626256826f00a!2s9%20de%20Julio%201449%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1777254201333!5m2!1ses-419!2sar"
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