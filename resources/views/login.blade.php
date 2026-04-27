@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Iniciar Sesión</h1>
            <div class="card mt-4">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control custom-input" placeholder="Ingrese su email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control custom-input" placeholder="Ingrese su contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection