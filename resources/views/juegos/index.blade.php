@extends('layouts.template')

@section('content')
<h1 class="text-center">Lista de Juegos</h1>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 text-end">
            <a href="{{ route('juegos.create') }}" class="btn btn-success">Añadir Nuevo Juego</a>
        </div>
    </div>

    <div class="row">
        @foreach ($juegos as $juego)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>{{ $juego->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Compañía:</strong> {{ $juego->compañia }}</p>
                        <p><strong>Plataforma:</strong> {{ $juego->plataforma }}</p>
                        <p><strong>Categoría:</strong> {{ $juego->categoria }}</p>
                        <div class="text-end">
                            <a href="{{ route('juegos.show', $juego->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('juegos.edit', $juego->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
