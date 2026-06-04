@extends('layouts.app')

@section('title', 'Mis pedidos')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="h4 fw-bold mb-1">Mis pedidos</h1>
        <p class="text-secondary mb-4">Historial de pedidos generados desde tu carrito.</p>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Envio / pago</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $pedido)
                        @php
                            $metodosPago = [
                                'efectivo' => 'Efectivo al retirar',
                                'transferencia' => 'Mercado Pago',
                                'tarjeta' => 'Tarjeta debito/credito',
                            ];
                            $subtotalPedido = $pedido->subtotal ?? (($pedido->producto->precio ?? 0) * $pedido->cantidad);
                        @endphp
                        <tr>
                            <td>{{ $pedido->producto->nombre ?? 'Sin producto' }}</td>
                            <td>{{ $pedido->cantidad }}</td>
                            <td>
                                @if(!empty($pedido->envio_direccion) && $pedido->envio_direccion !== 'Retiro en local')
                                    <div>{{ $pedido->envio_direccion }}</div>
                                    <small class="text-secondary">{{ $pedido->envio_ciudad ?? '' }}, {{ $pedido->envio_provincia ?? '' }}</small>
                                @else
                                    <div><strong>Retiro en local</strong></div>
                                    <small class="text-secondary">Facena UNNE - Retiro sin cargo</small>
                                @endif
                                <small class="text-secondary d-block mt-1">Pago: {{ $metodosPago[$pedido->metodo_pago] ?? ($pedido->metodo_pago ?? 'Sin definir') }}</small>
                            </td>
                            <td>${{ number_format($subtotalPedido, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($pedido->estado) }}</td>
                            <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">Todavia no generaste pedidos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
