@extends('layouts.app')

@section('title', 'Comercialización')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-2 fw-bold" style="color: #3b82f6;">Comercialización</h1>
            
            <p class="lead text-center mb-5 text-secondary">
                Descubre nuestras opciones de entrega, envío y pago para una experiencia de compra excepcional.
            </p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-light fw-bold">Tipos de Entregas</h5>
                    <ul class="list-unstyled">
                        <li><strong>Entrega Estándar:</strong> 3-5 días hábiles</li>
                        <li><strong>Entrega Express:</strong> 1-2 días hábiles</li>
                        <li><strong>Entrega en el Día:</strong> Disponible en áreas metropolitanas</li>
                        <li><strong>Recogida en Tienda:</strong> Gratuita y inmediata</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-light fw-bold">Formas de Envíos</h5>
                    <ul class="list-unstyled">
                        <li><strong>Envío Nacional:</strong> Cobertura en todo el país</li>
                        <li><strong>Envío Internacional:</strong> A más de 50 países</li>
                        <li><strong>Envío Seguro:</strong> Seguimiento en tiempo real</li>
                        <li><strong>Embalaje Especial:</strong> Para productos frágiles</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-light fw-bold">Métodos de Pago</h5>
                    <ul class="list-unstyled">
                        <li><strong>Tarjetas de Crédito/Débito:</strong> Visa, Mastercard, American Express</li>
                        <li><strong>Transferencia Bancaria:</strong> Seguro y sin comisiones</li>
                        <li><strong>Pago en Efectivo:</strong> Al momento de la entrega</li>
                        <li><strong> Mercado Pago:</strong> Opción conveniente para pagos en línea</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5 justify-content-center">
    <div class="col-md-10 col-lg-8">
        <h2 class="text-center mb-4 fw-bold text-light">Información Útil para Nuestros Clientes</h2>
        
        <div class="accordion accordion-flush custom-accordion" id="accordionExample">
            
            <div class="accordion-item bg-transparent border-secondary">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed bg-transparent text-light shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        ¿Cómo realizar un pedido?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-secondary-emphasis" style="color: #adb5bd !important;">
                        Selecciona tus productos, agrega al carrito y procede al checkout. Completa tus datos de envío y elige tu método de pago.
                    </div>
                </div>
            </div>

            <div class="accordion-item bg-transparent border-secondary">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed bg-transparent text-light shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Políticas de Devolución
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-secondary-emphasis" style="color: #adb5bd !important;">
                        Aceptamos devoluciones dentro de 30 días. El producto debe estar en su estado original. Contacta nuestro soporte para iniciar el proceso.
                    </div>
                </div>
            </div>

            <div class="accordion-item bg-transparent border-secondary">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed bg-transparent text-light shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        Garantías y Soporte
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-secondary-emphasis" style="color: #adb5bd !important;">
                        Todos nuestros productos incluyen garantía de 1 año. Nuestro equipo de soporte está disponible 24/7 para resolver cualquier duda.
                    </div>
                </div>
            </div>

            <div class="accordion-item bg-transparent border-bottom border-secondary">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed bg-transparent text-light shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                        Consejos para una Mejor Experiencia
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-secondary-emphasis" style="color: #adb5bd !important;">
                        Verifica tu dirección de envío antes de confirmar. Opta por entregas express para urgencias. Utiliza métodos de pago seguros para tranquilidad.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12 text-center">
            <h3>¿Tienes Preguntas?</h3>
            <p>Contacta nuestro equipo de ventas para más información personalizada.</p>
            <a href="/contacto" class="btn btn-primary btn-lg">Contáctanos</a>
        </div>
    </div>

                
@endsection