@extends('layouts.app')

@section('title', 'Términos y Usos')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fade-in-up" style="color: #ffffff;">Términos y Usos</h1>
    <p class="lead mb-5">Última actualización: 20/04/2026</p>

    <div class="card mb-5">
        <div class="card-body">
            <h3 class="card-title mb-3">Índice de contenidos</h3>
            <ul class="list-unstyled row row-cols-1 row-cols-md-2 g-2">
                <li><a href="#aviso-legal" class="text-white">1. Aviso Legal</a></li>
                <li><a href="#terminos-uso" class="text-white">2. Términos de Uso del Sitio Web</a></li>
                <li><a href="#privacidad" class="text-white">3. Política de Privacidad</a></li>
                <li><a href="#condiciones-venta" class="text-white">4. Condiciones de Venta</a></li>
                <li><a href="#garantias" class="text-white">5. Garantías</a></li>
                <li><a href="#soporte-posventa" class="text-white">6. Soporte Posventa</a></li>
                <li><a href="#entregas" class="text-white">7. Formas de Entrega y Tiempos</a></li>
                <li><a href="#procedimientos" class="text-white">8. Procedimientos de Compra</a></li>
            </ul>
        </div>
    </div>

    <section id="aviso-legal" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">1. Aviso Legal</h3>
            <p>Este sitio web es propiedad de <strong>Punto Electrónico S.R.L.</strong>, con domicilio legal en hola</p>
            <p><strong>Titulares:</strong> Benitez Vallejos Nicolas y Acevedo Acosta Nazareno.</p>
            <p><strong>Correo electrónico de contacto:</strong> puntoelectr@gmail.com</p>
            <p>La utilización del sitio atribuye la condición de Usuario e implica la aceptación plena y sin reservas de todas y cada una de las disposiciones incluidas en este Aviso Legal y en los Términos y Condiciones que se detallan a continuación.</p>
        </div>
    </section>

    <section id="terminos-uso" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">2. Términos de Uso del Sitio Web</h3>
            <p>El Usuario se compromete a utilizar el sitio y sus contenidos de conformidad con la ley, la moral y el orden público. Queda expresamente prohibido:</p>
            <ul>
                <li>Utilizar el Sitio con fines ilícitos, lesivos o contrarios a los derechos de Punto Electrónico o de terceros.</li>
                <li>Realizar actos que dañen, inutilicen, sobrecarguen o deterioren los sistemas, equipos o servicios informáticos.</li>
                <li>Reproducir, copiar, distribuir, transformar o modificar los contenidos del sitio sin autorización previa y por escrito.</li>
            </ul>
            <p>Punto Electrónico se reserva el derecho de modificar, suspender o interrumpir el sitio o parte del mismo en cualquier momento sin previo aviso.</p>
        </div>
    </section>

    <section id="privacidad" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">3. Política de Privacidad</h3>
            <p>En Punto Electrónico nos comprometemos a proteger la privacidad de nuestros usuarios. Los datos personales que nos proporciones a través de formularios de contacto, registro o compra serán tratados con la máxima confidencialidad y únicamente para los fines específicos para los que fueron recabados (gestión de pedidos, envío de información solicitada, atención al cliente).</p>
            <p>No compartiremos tus datos con terceros sin tu consentimiento expreso, salvo obligación legal. Puedes ejercer tus derechos de acceso, rectificación, cancelación y oposición enviando un correo a puntoelectr@gmail.com</p>
            <p>El sitio utiliza cookies técnicas necesarias para su funcionamiento. Al navegar aceptas su uso.</p>
        </div>
    </section>

    <section id="condiciones-venta" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">4. Condiciones de Venta</h3>
            <p>Todos los productos ofrecidos en nuestro catálogo están sujetos a disponibilidad de stock. Los precios se expresan en pesos argentinos e incluyen el IVA, salvo indicación contraria.</p>
            <p>Punto Electrónico se reserva el derecho de modificar precios y características de los productos sin previo aviso. Las imágenes son de carácter ilustrativo y pueden no coincidir exactamente con el producto final.</p>
            <p><strong>Medios de pago aceptados:</strong> Transferencia bancaria, tarjetas de crédito/débito a través de Mercado Pago, y efectivo en nuestro local.</p>
        </div>
    </section>

    <section id="garantias" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">5. Garantías</h3>
            <p>Todos nuestros productos cuentan con la garantía legal de 6 meses por defectos de fabricación, de acuerdo a la Ley de Defensa del Consumidor (Ley 24.240). Además, ofrecemos una garantía extendida de 12 meses en componentes seleccionados, especificada en cada producto.</p>
            <p>La garantía cubre exclusivamente fallas de origen. No cubre daños por uso indebido, golpes, derrames de líquidos, alteraciones realizadas por personal no autorizado o desgaste natural.</p>
            <p>Para hacer efectiva la garantía, el cliente deberá presentar la factura de compra y el producto en las mismas condiciones en que fue entregado, con todos sus accesorios.</p>
        </div>
    </section>

    <section id="soporte-posventa" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">6. Soporte Posventa</h3>
            <p>Brindamos asesoramiento técnico gratuito durante 6 meses posteriores a la compra para la correcta instalación y configuración de los productos adquiridos. Pasado ese período, el soporte técnico puede tener aranceles diferenciados según la complejidad.</p>
            <p>Puedes contactar a nuestro equipo de soporte a través del <a href="{{ url('/consultas') }}" class="text-white">formulario de consultas</a>, por correo electrónico apuntoelectr@gmail.com o telefónicamente al +54 9 3794949990 o al +54 9 3794540426 en horario de atención.</p>
        </div>
    </section>

    <section id="entregas" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">7. Formas de Entrega y Tiempos</h3>
            <h4 class="h5">Retiro en local</h4>
            <p>Sin costo. Tu pedido estará disponible en nuestra sucursal de hola en un plazo máximo de 24 hs hábiles desde la acreditación del pago.</p>
            <h4 class="h5">Envío a domicilio</h4>
            <p>Realizamos envíos a todo el país a través de ViaCargo, Correo Argentino o Andreani. Los costos se calculan en función del peso, volumen y código postal de destino. El tiempo estimado de entrega es de 3 a 7 días hábiles según la localidad.</p>
            <p><strong>Importante:</strong> Los plazos de entrega son estimativos y pueden verse afectados por causas ajenas a la empresa (condiciones climáticas, demoras del transporte, etc.). Punto Electrónico no se responsabiliza por dichas demoras una vez que el paquete ha sido despachado.</p>
        </div>
    </section>

    <section id="procedimientos" class="card mb-4">
        <div class="card-body">
            <h3 class="card-title h3 mb-4">8. Procedimientos de Compra</h3>
            <ol>
                <li>Seleccioná los productos deseados y agregalos al carrito.</li>
                <li>Completá tus datos de contacto y facturación.</li>
                <li>Elegí el método de envío y la forma de pago.</li>
                <li>Revisá el resumen de tu pedido y confirmá la compra.</li>
                <li>Recibirás un correo electrónico con los detalles y las instrucciones para realizar el pago (en caso de transferencia).</li>
                <li>Una vez acreditado el pago, procesaremos tu pedido y te notificaremos cuando esté listo para retirar o despachar.</li>
            </ol>
            <p>Podés realizar el seguimiento de tu pedido ingresando a tu cuenta o contactándonos.</p>
        </div>
    </section>

</div>
@endsection