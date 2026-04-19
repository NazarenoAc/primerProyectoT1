@extends('layouts.app') 

@section('title', 'Sobre Nosotros - Punto Electrónico')

@section('content')
<section>
    
    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 bg-primary text-white shadow">
                <div class="card-body text-center p-5">
                    <h1 class="display-5 fw-bold">Punto Electrónico</h1>
                    <p class="lead fs-4">Tecnología que te conecta con lo que más te gusta.</p>
                    <hr class="my-4 w-25 mx-auto bg-white">
                    <p class="fs-5">
                        Somos una empresa emergente dedicada a la venta de celulares, televisores, consolas y auriculares. 
                        Más que una tienda, somos asesores apasionados por ayudarte a elegir el producto perfecto.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-success border-top border-3 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-success">🎯 Nuestra misión</h3>
                    <p class="card-text">Brindar productos tecnológicos de calidad con un servicio cercano y transparente. Queremos ser el aliado tecnológico de los hogares argentinos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-success border-top border-3 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-success">👁️ Nuestra visión</h3>
                    <p class="card-text">Convertirnos en el <strong>Punto de Encuentro</strong> digital líder para los amantes de la tecnología, expandiendo nuestro catálogo con las últimas tendencias del mercado.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-success border-top border-3 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-success">💡 Nuestros valores</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">✅ Confianza y Garantía</li>
                        <li class="mb-2">✅ Atención Personalizada</li>
                        <li class="mb-2">✅ Pasión por la Innovación</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold">El equipo detrás de la tecnología</h2>
            <hr class="w-25 mx-auto">
        </div>
        

        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body p-4">
                    <div class="mb-3">
                        
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <h4 class="card-title fw-bold">Benitez, Nicolas</h4>
                    <p class="text-secondary mb-1"><i class="bi bi-geo-alt-fill"></i> Corrientes, Argentina</p>
                    <p class="text-secondary mb-3"><i class="bi bi-calendar"></i> 20 años</p>
                    <span class="badge bg-success p-2 px-3">Asesor de Ventas y Logística</span>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <h4 class="card-title fw-bold">Acevedo Acosta, Nazareno</h4>
                    <p class="text-secondary mb-1"><i class="bi bi-geo-alt-fill"></i> Corrientes, Argentina</p>
                    <p class="text-secondary mb-3"><i class="bi bi-calendar"></i> 20 años</p>
                    <span class="badge bg-success p-2 px-3">Asesor de Ventas y Logística</span>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <p class="fs-5">¿Listo para renovar tu tecnología?</p>
            <a href="/contacto" class="btn btn-secondary btn-lg mt-2 px-5">Contáctanos</a>
        </div>
    </div>
</section>
@endsection