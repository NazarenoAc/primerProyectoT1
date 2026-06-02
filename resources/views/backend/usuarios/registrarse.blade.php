@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-white text-center">Registrarse</h1>
            <div class="card mt-4">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control custom-input" placeholder="Ingrese su nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control custom-input" placeholder="Ingrese su email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control custom-input" placeholder="Ingrese su contraseña">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control custom-input" placeholder="Confirme su contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
