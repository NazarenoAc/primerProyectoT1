@extends('layouts.app')

@section('title', 'Panel Administrador')

@section('content')
<div class="admin-page">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="admin-sidebar-title">Menu administrador</div>
            <div class="nav admin-nav" id="admin-tabs" role="tablist">
                <button class="nav-link active" id="resumen-tab" data-bs-toggle="pill" data-bs-target="#resumen-panel" type="button" role="tab">
                    <i class="bi bi-grid-1x2"></i>Resumen
                </button>
                <button class="nav-link" id="productos-tab" data-bs-toggle="pill" data-bs-target="#productos-panel" type="button" role="tab">
                    <i class="bi bi-boxes"></i>Productos
                </button>
                <button class="nav-link" id="usuarios-tab" data-bs-toggle="pill" data-bs-target="#usuarios-panel" type="button" role="tab">
                    <i class="bi bi-people"></i>Usuarios
                </button>
                <button class="nav-link" id="ventas-tab" data-bs-toggle="pill" data-bs-target="#ventas-panel" type="button" role="tab">
                    <i class="bi bi-bag-check"></i>Ventas
                </button>
                <button class="nav-link" id="consultas-tab" data-bs-toggle="pill" data-bs-target="#consultas-panel" type="button" role="tab">
                    <i class="bi bi-chat-left-text"></i>Consultas
                </button>
            </div>
        </aside>

        <div class="admin-content">
            @if(session('admin_success'))
                <div class="alert alert-success border-0 shadow-sm">{{ session('admin_success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger border-0 shadow-sm">
                    Revisa los datos ingresados y volve a intentar.
                </div>
            @endif

            <div class="tab-content">
                <section class="tab-pane fade show active" id="resumen-panel" role="tabpanel" aria-labelledby="resumen-tab">
                    <div class="admin-hero mb-4">
                        <div class="row align-items-center g-3">
                            <div class="col-lg-8">
                                <div class="fw-semibold mb-2 text-info">Administracion</div>
                                <h1 class="fw-bold mb-2">Panel de Gestion</h1>
                                <p class="mb-0">Control de stock, usuarios, pedidos, restock y consultas del sitio.</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="admin-welcome">
                                    <div class="fw-bold">
                                        <i class="bi bi-shield-lock me-2"></i>Bienvenido, {{ auth()->user()->nombre }}
                                    </div>
                                    <small><i class="bi bi-calendar3 me-2"></i>{{ now()->format('d/m/Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-6 col-xl">
                            <div class="card admin-card admin-kpi">
                                <div class="card-body">
                                    <span class="admin-kpi-icon"><i class="bi bi-box-seam"></i></span>
                                    <div>
                                        <div class="admin-kpi-value">{{ $metricas['productos'] }}</div>
                                        <div class="admin-muted">Productos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-xl">
                            <div class="card admin-card admin-kpi">
                                <div class="card-body">
                                    <span class="admin-kpi-icon"><i class="bi bi-exclamation-triangle"></i></span>
                                    <div>
                                        <div class="admin-kpi-value">{{ $metricas['bajo_stock'] }}</div>
                                        <div class="admin-muted">Bajo stock</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-xl">
                            <div class="card admin-card admin-kpi">
                                <div class="card-body">
                                    <span class="admin-kpi-icon"><i class="bi bi-people"></i></span>
                                    <div>
                                        <div class="admin-kpi-value">{{ $metricas['usuarios'] }}</div>
                                        <div class="admin-muted">Usuarios</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-xl">
                            <div class="card admin-card admin-kpi">
                                <div class="card-body">
                                    <span class="admin-kpi-icon"><i class="bi bi-chat-left-text"></i></span>
                                    <div>
                                        <div class="admin-kpi-value">{{ $metricas['consultas_pendientes'] }}</div>
                                        <div class="admin-muted">Consultas</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-xl">
                            <div class="card admin-card admin-kpi">
                                <div class="card-body">
                                    <span class="admin-kpi-icon"><i class="bi bi-clipboard-check"></i></span>
                                    <div>
                                        <div class="admin-kpi-value">{{ $metricas['pedidos_pendientes'] }}</div>
                                        <div class="admin-muted">Pedidos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="tab-pane fade" id="productos-panel" role="tabpanel" aria-labelledby="productos-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-boxes"></i></span>
                                <div>
                                    <h2>Productos y stock</h2>
                                    <p>Crea productos y actualiza unidades disponibles.</p>
                                </div>
                            </div>

                            <form action="{{ route('admin.productos.crear') }}" method="POST" class="admin-product-form mb-4">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label class="form-label" for="producto_nombre">Producto</label>
                                        <input id="producto_nombre" name="nombre" type="text" class="form-control" value="{{ old('nombre') }}" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label" for="producto_categoria">Categoria</label>
                                        <select id="producto_categoria" name="categoria_id" class="form-select" required>
                                            <option value="">Seleccionar</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" @selected((string) old('categoria_id') === (string) $categoria->id)>{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label" for="producto_precio">Precio</label>
                                        <input id="producto_precio" name="precio" type="number" step="0.01" min="0" class="form-control" value="{{ old('precio') }}" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label" for="producto_stock">Stock</label>
                                        <input id="producto_stock" name="stock" type="number" min="0" class="form-control" value="{{ old('stock', 0) }}" required>
                                    </div>
                                    <div class="col-lg-1 d-flex align-items-end">
                                        <div class="form-check form-switch mb-2">
                                            <input id="producto_activo" class="form-check-input" type="checkbox" name="activo" value="1" @checked(old('activo', '1'))>
                                            <label class="form-check-label admin-muted" for="producto_activo">Activo</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <label class="form-label" for="producto_descripcion">Descripcion</label>
                                        <textarea id="producto_descripcion" name="descripcion" rows="2" class="form-control">{{ old('descripcion') }}</textarea>
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="form-label" for="producto_url_imagen">Imagen</label>
                                        <input id="producto_url_imagen" name="url_imagen" type="text" class="form-control" value="{{ old('url_imagen') }}" placeholder="images/productos.png o URL https://...">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-primary" type="submit">Crear producto</button>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table admin-table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categoria</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th class="text-end">Control de stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($productos as $producto)
                                            <tr>
                                                <td>
                                                    <div class="fw-semibold">{{ $producto->nombre }}</div>
                                                    <small class="admin-muted">{{ str($producto->descripcion)->limit(70) }}</small>
                                                </td>
                                                <td>{{ $producto->categoria->nombre ?? 'Sin categoria' }}</td>
                                                <td>${{ number_format($producto->precio, 2, ',', '.') }}</td>
                                                <td>
                                                    @if($producto->stock === 0)
                                                        <span class="status-dot danger"></span>Sin stock
                                                    @elseif($producto->stock <= 5)
                                                        <span class="status-dot warn"></span>Bajo
                                                    @else
                                                        <span class="status-dot"></span>Disponible
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <form action="{{ route('admin.productos.stock', $producto) }}" method="POST" class="admin-stock-form d-flex align-items-center justify-content-end gap-2 ms-auto">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input class="form-control form-control-sm admin-stock-input" type="number" min="0" name="stock" value="{{ $producto->stock }}">
                                                        <div class="form-check form-switch m-0" title="Producto activo">
                                                            <input class="form-check-input" type="checkbox" name="activo" value="1" @checked($producto->activo)>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary" type="submit">
                                                            <i class="bi bi-save me-1"></i>Guardar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center admin-muted py-4">Todavia no hay productos cargados.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="tab-pane fade" id="usuarios-panel" role="tabpanel" aria-labelledby="usuarios-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-people"></i></span>
                                <div>
                                    <h2>Usuarios</h2>
                                    <p>Totales por rol, sin datos personales.</p>
                                </div>
                            </div>

                            @forelse($usuariosPorRol as $rol => $cantidad)
                                <div class="admin-pill-row d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-semibold">{{ ucfirst($rol) }}</span>
                                    <strong>{{ $cantidad }}</strong>
                                </div>
                            @empty
                                <p class="admin-muted mb-0">No hay usuarios registrados.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                <section class="tab-pane fade" id="ventas-panel" role="tabpanel" aria-labelledby="ventas-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-bag-check"></i></span>
                                <div>
                                    <h2>Ventas</h2>
                                    <p>Órdenes de compra de clientes.</p>
                                </div>
                            </div>

                            @forelse($ventasAgrupadas as $venta)
                                @php
                                    $clienteNombre = $venta->cliente_nombre;
                                    $primerProducto = $venta->productos_items->first();
                                @endphp
                                <div class="admin-sales-order">
                                    <div style="flex: 1;">
                                        <div class="admin-sales-order-number">Orden #{{ $venta->id }}</div>
                                        <div class="admin-sales-order-customer">
                                            @if($clienteNombre)
                                                {{ $clienteNombre }}
                                            @else
                                                Sin información del cliente
                                            @endif
                                        </div>
                                        <div class="admin-sales-order-date">{{ $venta->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                    <div class="admin-sales-order-total">${{ number_format($venta->total, 2, ',', '.') }}</div>
                                    <div class="admin-sales-order-status">
                                        <form action="{{ route('admin.pedidos.estado', $venta->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <select name="estado" class="form-select form-select-sm admin-select" onchange="this.form.submit()">
                                                @foreach(['pendiente', 'en proceso', 'completado', 'cancelado'] as $estado)
                                                    <option value="{{ $estado }}" @selected($venta->estado === $estado)>{{ ucfirst($estado) }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                    <div class="admin-sales-order-actions">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#saleDetailModal" onclick="loadSaleDetails({{ $venta->id }})">
                                            <i class="bi bi-eye me-1"></i>Ver detalles
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <p class="admin-muted mb-0 text-center py-4">No hay ventas registradas.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                <section class="tab-pane fade" id="consultas-panel" role="tabpanel" aria-labelledby="consultas-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-chat-left-text"></i></span>
                                <div>
                                    <h2>Consultas de usuarios</h2>
                                    <p>Mensajes enviados desde el formulario de contacto.</p>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table admin-table">
                                    <thead>
                                        <tr>
                                            <th>Consulta</th>
                                            <th>Contacto</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($consultas as $consulta)
                                            <tr>
                                                <td>
                                                    <div class="fw-semibold">{{ $consulta->asunto }}</div>
                                                    <small class="admin-muted">{{ str($consulta->mensaje)->limit(92) }}</small>
                                                </td>
                                                <td>
                                                    <div>{{ $consulta->nombre }} {{ $consulta->apellido }}</div>
                                                    <small class="admin-muted">{{ $consulta->email }}</small>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.consultas.estado', $consulta) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="estado" class="form-select form-select-sm admin-select" onchange="this.form.submit()">
                                                            @foreach(['pendiente', 'en revision', 'respondida', 'cerrada'] as $estado)
                                                                <option value="{{ $estado }}" @selected($consulta->estado === $estado)>{{ ucfirst($estado) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center admin-muted py-4">Todavia no llegaron consultas.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Modal para ver detalles de ventas -->
<div class="modal fade" id="saleDetailModal" tabindex="-1" aria-labelledby="saleDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="saleDetailModalLabel">Detalles de la Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="saleDetailContent">
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function loadSaleDetails(saleId) {
    const modalBody = document.getElementById('saleDetailContent');
    const modal = document.getElementById('saleDetailModal');
    
    // Cargar los datos del pedido
    fetch(`/admin/pedidos/${saleId}/detalles`)
        .then(response => response.json())
        .then(data => {
            let html = `
                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Orden #${data.id}</strong>
                        <div class="admin-muted">${data.fecha}</div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="fs-5 fw-bold">${data.total}</div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6>Cliente</h6>
                        <div>${data.cliente_nombre || 'Sin información'}</div>
                        <small class="admin-muted">${data.cliente_email || ''}</small>
                        ${data.cliente_telefono ? `<div><small class="admin-muted">Tel: ${data.cliente_telefono}</small></div>` : ''}
                    </div>
                    <div class="col-md-6">
                        <h6>Envío</h6>
                        <div>${data.envio_direccion || 'Sin datos de envío'}</div>
                        <small class="admin-muted">${data.envio_ciudad}, ${data.envio_provincia} (${data.envio_codigo_postal})</small>
                    </div>
                </div>
                
                <hr>
                
                <h6 class="mb-3">Productos</h6>
                <div class="table-responsive">
                    <table class="table table-sm admin-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th class="text-end">Cantidad</th>
                                <th class="text-end">Precio</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            
            data.productos.forEach(producto => {
                html += `
                    <tr>
                        <td>${producto.nombre}</td>
                        <td class="text-end">${producto.cantidad}</td>
                        <td class="text-end">${producto.precio}</td>
                        <td class="text-end"><strong>${producto.total}</strong></td>
                    </tr>
                `;
            });
            
            html += `
                        </tbody>
                    </table>
                </div>
                
                <hr>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6>Método de pago</h6>
                        <div>${data.metodo_pago}</div>
                    </div>
                    <div class="col-md-6 text-end">
                        <h6>Estado</h6>
                        <span class="badge bg-primary">${data.estado}</span>
                    </div>
                </div>
            `;
            
            modalBody.innerHTML = html;
        })
        .catch(error => {
            modalBody.innerHTML = '<div class="alert alert-danger">Error al cargar los detalles de la venta.</div>';
            console.error('Error:', error);
        });
}
</script>
@endsection
