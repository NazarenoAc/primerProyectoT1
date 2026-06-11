@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="catalog-header mb-4">
    <div>
        <h1 class="fw-bold mb-2">Productos Electronicos</h1>
        <p class="mb-0">Elegi tu proximo dispositivo y agregalo al carrito.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm">
        {{ $errors->first() }}
    </div>
@endif

@php
    $ordenQuery = $ordenSeleccionado ? ['orden' => $ordenSeleccionado] : [];
@endphp

<div class="catalog-tools mb-4">
    <div class="category-filter">
        <a href="{{ route('productos.index', $ordenQuery) }}" class="{{ empty($categoriaSeleccionada) ? 'active' : '' }}">Todos</a>
        @foreach($categorias as $categoria)
            <a href="{{ route('productos.index', array_merge($ordenQuery, ['categoria' => $categoria->nombre])) }}" class="{{ $categoriaSeleccionada === $categoria->nombre ? 'active' : '' }}">
                {{ $categoria->nombre }}
            </a>
        @endforeach
    </div>

    <form action="{{ route('productos.index') }}" method="GET" class="price-sort">
        @if($categoriaSeleccionada)
            <input type="hidden" name="categoria" value="{{ $categoriaSeleccionada }}">
        @endif
        <label for="orden">Ordenar</label>
        <select id="orden" name="orden" class="form-select" onchange="this.form.submit()">
            <option value="" @selected(empty($ordenSeleccionado))>Nombre</option>
            <option value="precio_asc" @selected($ordenSeleccionado === 'precio_asc')>Precio: menor a mayor</option>
            <option value="precio_desc" @selected($ordenSeleccionado === 'precio_desc')>Precio: mayor a menor</option>
        </select>
    </form>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
    @forelse($productos as $producto)
        @php
            $fallbackPorCategoria = match ($producto->categoria->nombre ?? '') {
                'Smartphones' => asset('images/novedades.png'),
                'Computadoras' => asset('images/productos.png'),
                'Audio' => asset('images/ofertas.png'),
                'TV y Monitores' => asset('images/bannerInicio.png'),
                default => asset('images/productos.png'),
            };

            $imagenProducto = $producto->url_imagen
                ? (\Illuminate\Support\Str::startsWith($producto->url_imagen, ['http://', 'https://'])
                    ? $producto->url_imagen
                    : asset($producto->url_imagen))
                : $fallbackPorCategoria;
        @endphp

        <div class="col">
            <div class="card product-card h-100 border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ $imagenProducto }}" onerror="this.onerror=null;this.src='{{ $fallbackPorCategoria }}';" class="card-img-top object-fit-cover" alt="{{ $producto->nombre }}">
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="product-category">{{ $producto->categoria->nombre ?? 'Sin categoria' }}</span>
                    </div>
                    <h2 class="card-title h5">{{ $producto->nombre }}</h2>
                    <p class="card-text flex-grow-1">{{ $producto->descripcion }}</p>

                    <div class="d-flex align-items-center justify-content-between gap-3 mt-3 w-100">
                        <div>
                            <div class="product-price">${{ number_format($producto->precio, 2, ',', '.') }}</div>
                            @auth
                                @if(auth()->user()->rol && auth()->user()->rol->nombre === 'admin')
                                    <small class="text-secondary">Stock: {{ $producto->stock }}</small>
                                @endif
                            @endauth
                        </div>

                        @auth
                            @if(! auth()->user()->rol || auth()->user()->rol->nombre !== 'admin')
                                <form action="{{ route('carrito.agregar', $producto) }}" method="POST">
                                    @csrf
                                    <button class="btn product-add-btn" type="submit" @disabled($producto->stock <= 0)>
                                        Agregar
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="/login" class="btn product-add-btn">Ingresar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <p class="mb-0">No hay productos disponibles.</p>
                </div>
            </div>
        </div>
    @endforelse
</div>
@endsection
