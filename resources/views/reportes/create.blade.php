@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Reportar un problema en el intercambio</h1>

        <form action="{{ route('reportes.store') }}" method="POST">
            @csrf
            <input type="hidden" name="usuario_reportado_id" value="{{ $intercambio->ofertante->id }}">

            <div class="mb-3">
                <label for="descripcion" class="form-label">Motivo del Reporte</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Reporte</button>
        </form>
    </div>
@endsection
