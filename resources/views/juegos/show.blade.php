@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Detalles del Juego: {{ $juego->nombre }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                    <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}" class="img-fluid" style="max-height: 300px; object-fit: cover;">
                        <div class="col-md-4">
                            <strong>Compañía:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $juego->compañia }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Plataforma:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $juego->plataforma }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Categoría:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{ $juego->categoria }}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Volver a la lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection