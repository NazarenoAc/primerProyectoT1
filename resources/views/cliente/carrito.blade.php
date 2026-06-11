@extends('layouts.app')

@section('title', 'Mi carrito')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
                    <div>
                        <h1 class="h4 fw-bold mb-1">Mi carrito</h1>
                        <p class="mb-0 text-secondary">Revisa tus productos antes de realizar el pedido.</p>
                    </div>
                    <a href="/productos" class="btn btn-subtle">Seguir comprando</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm">{{ $errors->first() }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $item->producto->nombre }}</div>
                                        <small class="text-secondary">{{ $item->producto->categoria->nombre ?? 'Sin categoria' }}</small>
                                    </td>
                                    <td>${{ number_format($item->producto->precio, 2, ',', '.') }}</td>
                                    <td>
                                        <div class="cart-quantity-control" aria-label="Cantidad de {{ $item->producto->nombre }}">
                                            <form action="{{ route('carrito.actualizar', $item) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="cantidad" value="{{ max(1, $item->cantidad - 1) }}">
                                                <button class="cart-qty-btn" type="submit" @disabled($item->cantidad <= 1)>-</button>
                                            </form>

                                            <span class="cart-qty-value">{{ $item->cantidad }}</span>

                                            <form action="{{ route('carrito.actualizar', $item) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="cantidad" value="{{ min($item->producto->stock, $item->cantidad + 1) }}">
                                                <button class="cart-qty-btn" type="submit" @disabled($item->cantidad >= $item->producto->stock)>+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('carrito.eliminar', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="cart-remove-btn" type="submit">Quitar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-4">Tu carrito esta vacio.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 fw-bold mb-3">Resumen</h2>
                <div class="d-flex justify-content-between mb-2">
                    <span>Productos</span>
                    <strong>{{ $items->sum('cantidad') }}</strong>
                </div>
                <div class="d-flex justify-content-between border-top pt-3 mt-3">
                    <span>Total</span>
                    <strong>${{ number_format($total, 2, ',', '.') }}</strong>
                </div>

                <form action="{{ route('carrito.confirmar') }}" method="POST" class="mt-4">
                    @csrf
                    
                    <div class="border-top pt-3 mt-3">
                        <h3 class="h6 fw-bold mb-3">Tipo de entrega</h3>
                        <div class="mb-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="tipo_entrega" id="retiro_local" value="retiro" {{ old('tipo_entrega') == 'retiro' ? 'checked' : '' }} @disabled($items->isEmpty()) required>
                                <label class="form-check-label" for="retiro_local">
                                    Retiro en el local
                                    <small class="d-block text-secondary">Facena UNNE - Retiro sin cargo</small>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_entrega" id="envio_domicilio" value="envio" {{ old('tipo_entrega') == 'envio' ? 'checked' : '' }} @disabled($items->isEmpty())>
                                <label class="form-check-label" for="envio_domicilio">
                                    Envío a domicilio
                                    <small class="d-block text-secondary">Costo según ubicación</small>
                                </label>
                            </div>
                            @error('tipo_entrega')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                            <label class="form-label" for="cliente_telefono">Teléfono</label>
                            <input id="cliente_telefono" name="cliente_telefono" type="text" class="form-control" value="{{ old('cliente_telefono') }}" placeholder="Ej: 9 3794 123456" @disabled($items->isEmpty()) {{ old('tipo_entrega') == 'envio' ? 'required' : '' }}>
                        </div>

                    <div id="datos_envio_container" style="display: {{ old('tipo_entrega') == 'envio' ? 'block' : 'none' }};">
                        
                        <div class="mb-3">
                            <label class="form-label" for="envio_direccion">Dirección</label>
                            <input id="envio_direccion" name="envio_direccion" type="text" class="form-control" value="{{ old('envio_direccion') }}" placeholder="Calle, número, piso" @disabled($items->isEmpty()) {{ old('tipo_entrega') == 'envio' ? 'required' : '' }}>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="envio_ciudad">Ciudad</label>
                                <input id="envio_ciudad" name="envio_ciudad" type="text" class="form-control" value="{{ old('envio_ciudad') }}" @disabled($items->isEmpty()) {{ old('tipo_entrega') == 'envio' ? 'required' : '' }}>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="envio_provincia">Provincia</label>
                                <input id="envio_provincia" name="envio_provincia" type="text" class="form-control" value="{{ old('envio_provincia') }}" @disabled($items->isEmpty()) {{ old('tipo_entrega') == 'envio' ? 'required' : '' }}>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="envio_codigo_postal">Código postal</label>
                            <input id="envio_codigo_postal" name="envio_codigo_postal" type="text" class="form-control" value="{{ old('envio_codigo_postal') }}" @disabled($items->isEmpty()) {{ old('tipo_entrega') == 'envio' ? 'required' : '' }}>
                        </div>
                    </div>

                    <div class="border-top pt-3 mt-3">
                        <label class="form-label" for="metodo_pago">Metodo de pago</label>
                        <select id="metodo_pago" name="metodo_pago" class="form-select" @disabled($items->isEmpty()) required>
                            <option value="">Seleccionar</option>
                            <option value="efectivo" @selected(old('metodo_pago') === 'efectivo')>Efectivo en el local</option>
                            <option value="transferencia" @selected(old('metodo_pago') === 'transferencia')>Mercado Pago</option>
                            <option value="tarjeta" @selected(old('metodo_pago') === 'tarjeta')>Tarjeta debito/credito</option>
                        </select>
                    </div>

                    <button class="btn btn-primary w-100 mt-3" type="submit" @disabled($items->isEmpty())>
                        Realizar pedido
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const radioRetiro = document.getElementById('retiro_local');
    const radioEnvio = document.getElementById('envio_domicilio');
    const datosEnvioContainer = document.getElementById('datos_envio_container');
    
    if (!radioRetiro || !radioEnvio || !datosEnvioContainer) return;
    
    const inputsEnvio = datosEnvioContainer.querySelectorAll('input, select, textarea');
    
    function toggleDatosEnvio() {
        if (radioEnvio.checked) {
            datosEnvioContainer.style.display = 'block';
            inputsEnvio.forEach(input => {
                if (input.id !== 'cliente_telefono') {
                    input.required = true;
                    input.disabled = false;
                }
            });
        } else {
            datosEnvioContainer.style.display = 'none';
            inputsEnvio.forEach(input => {
                if (input.id !== 'cliente_telefono') {
                    input.required = false;
                    input.disabled = true;
                }
            });
        }
    }
    
    radioRetiro.addEventListener('change', toggleDatosEnvio);
    radioEnvio.addEventListener('change', toggleDatosEnvio);
    
    toggleDatosEnvio();
});
</script>
@endsection