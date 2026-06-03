@extends('layouts.app')

@section('title', 'Panel Administrador')

@section('extra-css')
<style>
    .admin-page {
        color: #152033;
    }

    .admin-shell {
        display: grid;
        grid-template-columns: 250px minmax(0, 1fr);
        gap: 24px;
        align-items: start;
    }

    .admin-sidebar {
        position: sticky;
        top: 94px;
        background: #fff;
        border: 1px solid #dbe7f5;
        border-radius: 8px;
        box-shadow: 0 12px 32px rgba(15, 23, 42, .07);
        padding: 16px;
    }

    .admin-sidebar-title {
        color: #64748b;
        font-size: .78rem;
        font-weight: 800;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .admin-nav {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .admin-nav .nav-link {
        align-items: center;
        border: 0;
        border-radius: 8px;
        color: #334155;
        display: flex;
        font-weight: 750;
        gap: 10px;
        justify-content: flex-start;
        padding: 11px 12px;
        text-align: left;
        width: 100%;
    }

    .admin-nav .nav-link i {
        color: #0066cc;
        font-size: 1rem;
    }

    .admin-nav .nav-link.active {
        background: #0066cc;
        color: #fff;
    }

    .admin-nav .nav-link.active i {
        color: #fff;
    }

    .admin-content {
        min-width: 0;
    }

    .admin-hero {
        background: linear-gradient(135deg, #000922fa 0%, #08314a 58%, #0066cc 100%);
        border-radius: 8px;
        color: #fff;
        padding: 28px;
        box-shadow: 0 20px 48px rgba(0, 9, 34, .18);
    }

    .admin-welcome {
        background: rgba(255, 255, 255, .13);
        border: 1px solid rgba(255, 255, 255, .22);
        border-radius: 8px;
        padding: 14px 16px;
    }

    .admin-welcome small,
    .admin-hero p {
        color: rgba(255, 255, 255, .78);
    }

    .admin-card {
        background: #fff !important;
        border: 1px solid #dbe7f5 !important;
        border-radius: 8px !important;
        box-shadow: 0 12px 32px rgba(15, 23, 42, .07);
        height: 100%;
    }

    .admin-card .card-body {
        padding: 22px;
    }

    .admin-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
        padding-bottom: 14px;
        border-bottom: 1px solid #e7eef7;
    }

    .admin-title-icon,
    .admin-kpi-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #e7f1ff;
        color: #0066cc;
        flex: 0 0 auto;
    }

    .admin-title h2 {
        color: #152033 !important;
        font-size: 1.05rem;
        font-weight: 850;
        margin: 0;
    }

    .admin-title p,
    .admin-muted {
        color: #64748b !important;
        margin: 0;
    }

    .admin-kpi .card-body {
        display: flex;
        align-items: center;
        gap: 14px;
        min-height: 96px;
    }

    .admin-kpi-value {
        font-size: 1.8rem;
        font-weight: 850;
        line-height: 1;
    }

    .sales-summary {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .sales-total {
        background: #f8fbff;
        border: 1px solid #e7eef7;
        border-radius: 8px;
        padding: 16px;
    }

    .sales-total-label {
        color: #64748b;
        font-size: .86rem;
        font-weight: 750;
        margin-bottom: 6px;
    }

    .sales-total-value {
        color: #08314a;
        font-size: 1.7rem;
        font-weight: 850;
        line-height: 1;
    }

    .sales-total small {
        color: #64748b;
    }

    .sales-chart {
        background: #fff;
        border: 1px solid #dbe7f5;
        border-radius: 8px;
        padding: 18px;
        height: 100%;
    }

    .sales-chart-title {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 18px;
    }

    .sales-chart-title h3 {
        color: #152033;
        font-size: .98rem;
        font-weight: 850;
        margin: 0;
    }

    .sales-chart-title span {
        color: #64748b;
        font-size: .84rem;
    }

    .sales-bars {
        align-items: end;
        display: flex;
        gap: 10px;
        height: 170px;
        padding-top: 8px;
    }

    .sales-bar-item {
        align-items: center;
        display: flex;
        flex: 1;
        flex-direction: column;
        gap: 8px;
        min-width: 0;
    }

    .sales-bar-track {
        align-items: end;
        background: #edf5ff;
        border-radius: 8px;
        display: flex;
        height: 124px;
        overflow: hidden;
        width: 100%;
    }

    .sales-bar-fill {
        background: linear-gradient(180deg, #0066cc 0%, #08314a 100%);
        border-radius: 8px 8px 0 0;
        min-height: 4px;
        width: 100%;
    }

    .sales-bar-label {
        color: #64748b;
        font-size: .76rem;
        text-align: center;
        white-space: nowrap;
    }

    .sales-bar-value {
        color: #152033;
        font-size: .78rem;
        font-weight: 800;
        text-align: center;
    }

    .admin-table {
        --bs-table-bg: transparent;
        --bs-table-color: #152033;
        --bs-table-border-color: #e7eef7;
        margin-bottom: 0;
    }

    .admin-table thead th {
        color: #0066cc;
        font-size: .78rem;
        font-weight: 800;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .admin-table td,
    .admin-table th {
        vertical-align: middle;
    }

    .admin-stock-form {
        min-width: 270px;
    }

    .admin-stock-input {
        max-width: 92px;
    }

    .status-dot {
        width: 10px;
        height: 10px;
        display: inline-block;
        border-radius: 999px;
        margin-right: 6px;
        background: #22c55e;
    }

    .status-dot.warn {
        background: #f59e0b;
    }

    .status-dot.danger {
        background: #ef4444;
    }

    .admin-pill-row {
        background: #f8fbff;
        border: 1px solid #e7eef7;
        border-radius: 8px;
        padding: 12px;
    }

    .admin-select {
        min-width: 132px;
    }

    .admin-product-form {
        background: #f8fbff;
        border: 1px solid #e7eef7;
        border-radius: 8px;
        padding: 18px;
    }

    .admin-orders-table {
        min-width: 1080px;
    }

    @media (max-width: 991px) {
        .admin-shell {
            grid-template-columns: 1fr;
        }

        .admin-sidebar {
            position: static;
        }

        .admin-nav {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .sales-summary {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .admin-hero {
            padding: 20px;
        }

        .admin-table {
            min-width: 760px;
        }

        .admin-stock-form {
            min-width: 100%;
        }
    }

    @media (max-width: 576px) {
        .admin-nav {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

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
                <button class="nav-link" id="restock-tab" data-bs-toggle="pill" data-bs-target="#restock-panel" type="button" role="tab">
                    <i class="bi bi-truck"></i>Restock
                </button>
                <button class="nav-link" id="alertas-tab" data-bs-toggle="pill" data-bs-target="#alertas-panel" type="button" role="tab">
                    <i class="bi bi-exclamation-triangle"></i>Alertas
                </button>
                <button class="nav-link" id="pedidos-tab" data-bs-toggle="pill" data-bs-target="#pedidos-panel" type="button" role="tab">
                    <i class="bi bi-clipboard-check"></i>Pedidos
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

                    <div class="sales-summary mt-4 mb-4">
                        <div class="sales-total">
                            <div class="sales-total-label">Recaudacion semanal</div>
                            <div class="sales-total-value">${{ number_format($ventasMetricas['recaudacion_semana'], 2, ',', '.') }}</div>
                            <small>{{ $ventasMetricas['ventas_semana'] }} ventas completadas</small>
                        </div>
                        <div class="sales-total">
                            <div class="sales-total-label">Recaudacion mensual</div>
                            <div class="sales-total-value">${{ number_format($ventasMetricas['recaudacion_mes'], 2, ',', '.') }}</div>
                            <small>{{ $ventasMetricas['ventas_mes'] }} ventas completadas</small>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-xl-6">
                            <div class="sales-chart">
                                <div class="sales-chart-title">
                                    <div>
                                        <h3>Ventas de los ultimos 7 dias</h3>
                                        <span>Cantidad de pedidos de clientes completados</span>
                                    </div>
                                </div>
                                <div class="sales-bars">
                                    @foreach($ventasPorDia as $dia)
                                        <div class="sales-bar-item">
                                            <div class="sales-bar-value">{{ $dia['ventas'] }}</div>
                                            <div class="sales-bar-track">
                                                <div class="sales-bar-fill" style="height: {{ $dia['porcentaje'] }}%;"></div>
                                            </div>
                                            <div class="sales-bar-label">{{ $dia['label'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="sales-chart">
                                <div class="sales-chart-title">
                                    <div>
                                        <h3>Recaudacion por mes</h3>
                                        <span>Ultimos 6 meses</span>
                                    </div>
                                </div>
                                <div class="sales-bars">
                                    @foreach($recaudacionPorMes as $mes)
                                        <div class="sales-bar-item">
                                            <div class="sales-bar-value">${{ number_format($mes['recaudacion'], 0, ',', '.') }}</div>
                                            <div class="sales-bar-track">
                                                <div class="sales-bar-fill" style="height: {{ $mes['porcentaje'] }}%;"></div>
                                            </div>
                                            <div class="sales-bar-label">{{ $mes['label'] }}</div>
                                        </div>
                                    @endforeach
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

                <section class="tab-pane fade" id="restock-panel" role="tabpanel" aria-labelledby="restock-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-truck"></i></span>
                                <div>
                                    <h2>Restock</h2>
                                    <p>Crear pedido interno de reposicion.</p>
                                </div>
                            </div>

                            <form action="{{ route('admin.pedidos.restock') }}" method="POST" class="vstack gap-3">
                                @csrf
                                <select name="producto_id" class="form-select" required>
                                    <option value="">Seleccionar producto</option>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }} - stock {{ $producto->stock }}</option>
                                    @endforeach
                                </select>
                                <input type="number" min="1" max="9999" name="cantidad" class="form-control" placeholder="Cantidad" required>
                                <textarea name="detalle" rows="3" class="form-control" placeholder="Detalle interno"></textarea>
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-plus-circle me-1"></i>Crear pedido
                                </button>
                            </form>
                        </div>
                    </div>
                </section>

                <section class="tab-pane fade" id="alertas-panel" role="tabpanel" aria-labelledby="alertas-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-exclamation-triangle"></i></span>
                                <div>
                                    <h2>Alertas</h2>
                                    <p>Productos que necesitan reposicion.</p>
                                </div>
                            </div>

                            @forelse($productosBajoStock as $producto)
                                <div class="admin-pill-row d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-semibold">{{ $producto->nombre }}</div>
                                        <small class="admin-muted">Stock actual: {{ $producto->stock }}</small>
                                    </div>
                                    <span class="badge text-bg-warning">Reponer</span>
                                </div>
                            @empty
                                <p class="admin-muted mb-0">No hay alertas de stock.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                <section class="tab-pane fade" id="pedidos-panel" role="tabpanel" aria-labelledby="pedidos-tab">
                    <div class="card admin-card">
                        <div class="card-body">
                            <div class="admin-title">
                                <span class="admin-title-icon"><i class="bi bi-clipboard-check"></i></span>
                                <div>
                                    <h2>Pedidos</h2>
                                    <p>Ultimos movimientos de clientes o restock.</p>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table admin-table admin-orders-table">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Pedido</th>
                                            <th>Cliente</th>
                                            <th>Envio / pago</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pedidos as $pedido)
                                            @php
                                                $clienteNombre = $pedido->cliente_nombre ?? optional($pedido->usuario)->nombre;
                                                $clienteEmail = $pedido->cliente_email ?? optional($pedido->usuario)->email;
                                                $metodosPago = [
                                                    'efectivo' => 'Efectivo al recibir',
                                                    'transferencia' => 'Transferencia bancaria',
                                                    'tarjeta' => 'Tarjeta al retirar',
                                                ];
                                                $subtotalPedido = $pedido->subtotal ?? (($pedido->producto->precio ?? 0) * $pedido->cantidad);
                                            @endphp
                                            <tr>
                                                <td>{{ ucfirst($pedido->tipo) }}</td>
                                                <td>
                                                    <div>{{ $pedido->producto->nombre ?? 'Sin producto' }}</div>
                                                    <small class="admin-muted">{{ $pedido->created_at->format('d/m/Y H:i') }}</small>
                                                </td>
                                                <td>
                                                    @if($clienteNombre || $clienteEmail)
                                                        <div class="fw-semibold">{{ $clienteNombre ?? 'Cliente sin nombre' }}</div>
                                                        <small class="admin-muted d-block">{{ $clienteEmail ?? 'Sin email' }}</small>
                                                        @if($pedido->cliente_telefono)
                                                            <small class="admin-muted d-block">Tel: {{ $pedido->cliente_telefono }}</small>
                                                        @endif
                                                    @else
                                                        <span class="admin-muted">Interno</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($pedido->envio_direccion)
                                                        <div>{{ $pedido->envio_direccion }}</div>
                                                        <small class="admin-muted d-block">
                                                            {{ $pedido->envio_ciudad }}, {{ $pedido->envio_provincia }} ({{ $pedido->envio_codigo_postal }})
                                                        </small>
                                                    @else
                                                        <span class="admin-muted d-block">Sin datos de envio</span>
                                                    @endif
                                                    <small class="admin-muted d-block">
                                                        Pago: {{ $metodosPago[$pedido->metodo_pago] ?? ($pedido->metodo_pago ?? 'Sin definir') }}
                                                    </small>
                                                </td>
                                                <td>{{ $pedido->cantidad }}</td>
                                                <td>${{ number_format($subtotalPedido, 2, ',', '.') }}</td>
                                                <td>
                                                    <form action="{{ route('admin.pedidos.estado', $pedido) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="estado" class="form-select form-select-sm admin-select" onchange="this.form.submit()">
                                                            @foreach(['pendiente', 'en proceso', 'completado', 'cancelado'] as $estado)
                                                                <option value="{{ $estado }}" @selected($pedido->estado === $estado)>{{ ucfirst($estado) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center admin-muted py-4">No hay pedidos registrados.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
@endsection
