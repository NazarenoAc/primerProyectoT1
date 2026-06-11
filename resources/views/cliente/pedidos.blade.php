@extends('layouts.app')

@section('title', 'Mis pedidos')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="h4 fw-bold mb-1">Mis pedidos</h1>
        <p class="text-secondary mb-4">Historial de pedidos realizados desde tu carrito.</p>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Productos</th>
                        <th>Envio / pago</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ordenes as $orden)
                        @php
                            $metodosPago = [
                                'efectivo' => 'Efectivo al retirar',
                                'transferencia' => 'Mercado Pago',
                                'tarjeta' => 'Tarjeta debito/credito',
                            ];
                            $productosLista = $orden->productos_items->map(function ($p) {
                                $nombre = $p->producto->nombre ?? 'Sin producto';
                                return $nombre . ' x' . $p->cantidad;
                            })->join(', ');
                            $numeroOrden = $ordenes->count() - $loop->index;
                        @endphp
                        <tr>
                            <td>#{{ $numeroOrden }}</td>
                            <td>{{ $productosLista }}</td>
                            <td>
                                @if(!empty($orden->productos_items->first()->envio_direccion) && $orden->productos_items->first()->envio_direccion !== 'Retiro en local')
                                    <div>{{ $orden->productos_items->first()->envio_direccion }}</div>
                                    <small class="text-secondary">{{ $orden->productos_items->first()->envio_ciudad ?? '' }}, {{ $orden->productos_items->first()->envio_provincia ?? '' }}</small>
                                @else
                                    <div><strong>Retiro en local</strong></div>
                                    <small class="text-secondary">Facena UNNE - Retiro sin cargo</small>
                                @endif
                                <small class="text-secondary d-block mt-1">Pago: {{ $metodosPago[$orden->metodo_pago] ?? ($orden->metodo_pago ?? 'Sin definir') }}</small>
                            </td>
                            <td>${{ number_format($orden->total, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($orden->estado) }}</td>
                            <td>{{ $orden->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">Todavia no realizaste ningun pedido.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
