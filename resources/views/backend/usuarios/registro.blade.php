@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-white text-center">Registrarse</h1>
            <div class="card mt-4">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/registrarse" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control custom-input" placeholder="Ingrese su nombre" value="{{ old('nombre') }}">
                            @error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control custom-input" placeholder="Ingrese su email" value="{{ old('email') }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control custom-input" placeholder="Ingrese su contraseña">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control custom-input" placeholder="Confirme su contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
