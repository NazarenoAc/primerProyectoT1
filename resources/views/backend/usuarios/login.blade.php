@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Iniciar Sesión</h1>
            <div class="card mt-4">
                <div class="card-body">

                    {{-- Bloque para mostrar errores si las credenciales fallan --}}
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-3">
                            <ul class="mb-0" style="font-size: 0.9rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- CORREGIDO: Ahora apunta al proceso de login mediante POST --}}
                    <form action="/login" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            {{-- CORREGIDO: Se agregó name="email" y value="{{ old('email') }}" --}}
                            <input type="email" name="email" class="form-control custom-input" placeholder="Ingrese su email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            {{-- CORREGIDO: Se agregó name="password" --}}
                            <input type="password" name="password" class="form-control custom-input" placeholder="Ingrese su contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection