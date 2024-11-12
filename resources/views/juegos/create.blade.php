@extends('layouts.template')

@section('content')
<div class="container">
    <h3 class="mb-4">Añadir Nuevo Juego</h3>

    <form action="{{ route('juegos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Juego</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="compañia" class="form-label">Compañía</label>
            <input type="text" class="form-control" id="compañia" name="compañia" value="{{ old('compañia') }}" required>
        </div>

        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma</label>
            <input type="text" class="form-control" id="plataforma" name="plataforma" value="{{ old('plataforma') }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ old('categoria') }}" required>
        </div>

        <div class="text-end">
            <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar Juego</button>
        </div>
    </form>
</div>
@endsection