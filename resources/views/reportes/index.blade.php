<!-- resources/views/reportes/index.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Reportes Activos</h1>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Ofertante</th>
                    <th>Receptor</th>
                    <th>Descripción</th>
                    <th>Fecha de Reporte</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->usuario->name }}</td> <!-- Usuario que reporta -->
                        <td>{{ $reporte->usuarioReportado->name }}</td> <!-- Usuario reportado -->
                        <td>{{ $reporte->descripcion }}</td>
                        <td>{{ $reporte->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form action="{{ route('reportes.resolve', $reporte->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Marcar como resuelto</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
