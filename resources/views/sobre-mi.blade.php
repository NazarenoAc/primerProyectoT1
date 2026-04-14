@extends('layouts.app')

@section('title', 'Sobre Mi')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Sobre mí</h1>
                    <p><b>Nombre:</b> Nazareno Acevedo Acosta</p>
                    <p><b>Edad:</b> 21 años</p>
                    <p><b>De dónde soy:</b> Corrientes, Argentina</p>
                    <p><b>Me gustaría trabajar en:</b> Desarrollo de software</p>
                    <p><b>Expectativas del curso:</b> Aprender Laravel</p>
                    <p><b>Hobbies:</b> Programar y deportes</p>
                </div>
            </div>
            <a href="#" class="btn btn-primary mt-3">Descargar CV</a>
            <a href="#" class="btn btn-secondary mt-3">Contactar</a>
        </div>
    </div>
@endsection