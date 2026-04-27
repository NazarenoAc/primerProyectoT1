@extends('layouts.app') 

@section('title', '¿Quiénes Somos? - Punto Electrónico')

@section('content')
<section class="py-5">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <h1 class="display-4 fw-bold text-white">Quiénes <span style="color: #3b82f6;">Somos</span></h1>
            <p class="text-light fs-5">Más de una década llevando innovación tecnológica a hogares y empresas.</p>
        </div>
    </div>

   

    </section>


    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-success border-top border-3 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-light">Nuestra misión</h3>
                    <p class="card-text">Brindar productos tecnológicos de calidad con un servicio cercano y transparente. Queremos ser el aliado tecnológico de los hogares argentinos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-success border-top border-3 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-light">Nuestra visión</h3>
                    <p class="card-text">Convertirnos en el <strong>Punto de Encuentro</strong> digital líder para los amantes de la tecnología, expandiendo nuestro catálogo con las últimas tendencias del mercado.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-success border-top border-3 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-light">Nuestros valores</h3>
                    <ul class="ps-3">
                        <li class="mb-2"><strong>Confianza y Garantía</strong></li>
                        <li class="mb-2"><strong>Atención Personalizada</strong></li>
                        <li class="mb-2"><strong>Pasión por la Innovación</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold text-light">El equipo detrás de la tecnología</h2>
            <hr class="w-25 mx-auto">
        </div>
        

        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body p-4">
                    <div class="mb-3">
                        
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <h3 class="card-title fw-bold">Benitez Vallejos, Nicolas</h3>
                    <p class="text-secondary mb-1"><i class="bi bi-geo-alt-fill"></i> Corrientes, Argentina</p>
                    <p class="text-secondary mb-3"></i> 20 años</p>
                    <span class="badge p-2 px-3">Vendedor y asesor de ventas</span>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <h3 class="card-title fw-bold">Acevedo Acosta, Nazareno</h3>
                    <p class="text-secondary mb-1"><i class="bi bi-geo-alt-fill"></i> Corrientes, Argentina</p>
                    <p class="text-secondary mb-3"></i> 20 años</p>
                    <span class="badge p-2 px-3">Vendedor y asesor de ventas</span>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <p class="fs-5">¿Listo para renovar tu tecnología?</p>
            <a href="/productos" class="btn btn-primary mt-2 px-5">Explora nuestro catálogo</a>
            
        </div>
    </div>
</section>
@endsection