@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <!-- Título principal -->
    <div class="text-center mb-4">
        <h1 class="display-4 text-primary">Bienvenido a GameTeca</h1>
        <p class="lead text-muted">
            Esta es una plataforma exclusiva para estudiantes de la Universidad de Guadalajara, donde puedes intercambiar videojuegos de diferentes géneros y plataformas. Encuentra juegos de diversas compañías y disfruta de un amplio catálogo.
        </p>
    </div>

    <!-- Sección de Juegos Disponibles -->
    <h2 class="text-center mb-4">Juegos Disponibles</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($juegos as $juego)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <!-- Imagen del juego (si está disponible) -->
                    <!-- <img src="{{ asset($juego->imagen ?? 'images/default-game.jpg') }}" class="card-img-top" alt="{{ $juego->nombre }}"> -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $juego->nombre }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($juego->descripcion, 100) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('juegos.show', $juego->id) }}" class="btn btn-info w-100">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
