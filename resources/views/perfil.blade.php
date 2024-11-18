@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary text-center">Perfil de {{ $usuario->name }}</h1>
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">Información del Usuario</h5>
            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Fecha de Registro:</strong> {{ $usuario->created_at->format('d-m-Y') }}</p>
        </div>
    </div>

    <h2 class="text-primary text-center mt-5">Juegos Ofertados</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        @forelse ($juegos as $juego)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $juego->imagen) }}" class="card-img-top" alt="Imagen de {{ $juego->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $juego->nombre }}</h5>
                        <p class="card-text">Compañía: {{ $juego->compañia }}</p>
                        <p class="card-text">Plataforma: {{ $juego->plataforma }}</p>
                        <a href="{{ route('juegos.show', $juego->id) }}" class="btn btn-info">Ver detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">No tienes juegos ofertados actualmente.</p>
        @endforelse
    </div>
</div>
@endsection
