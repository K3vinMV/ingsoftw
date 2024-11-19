@extends('layouts.template') 

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Intercambios</h1>

        <!-- Mostrar mensaje de éxito si está presente -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Ofertante</th>
                    <th>Receptor</th>
                    <th>Juego Ofrecido</th>
                    <th>Juego Solicitado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($intercambios as $intercambio)
                    <tr>
                        <td>{{ $intercambio->ofertante->name }}</td>
                        <td>{{ $intercambio->receptor->name }}</td>
                        <td>{{ $intercambio->juegoOfrecido->nombre }}</td>
                        <td>{{ $intercambio->juegoSolicitado->nombre }}</td>
                        <td>
                            @if($intercambio->estado == 'pendiente')
                                <span class="badge badge-warning">Pendiente</span>
                            @elseif($intercambio->estado == 'aceptado')
                                <span class="badge badge-success">Aceptado</span>
                            @else
                                <span class="badge badge-danger">Rechazado</span>
                            @endif
                        </td>
                        <td>
                            <!-- Mostrar los botones solo si el usuario está involucrado en el intercambio -->
                            @if(auth()->user()->id == $intercambio->ofertante_id || auth()->user()->id == $intercambio->receptor_id)
                                
                                @if($intercambio->estado == 'pendiente')
                                    <form action="{{ route('intercambios.updateStatus', ['intercambio' => $intercambio->id, 'estado' => 'aceptado']) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Aceptar</button>
                                    </form>
                                    <form action="{{ route('intercambios.updateStatus', ['intercambio' => $intercambio->id, 'estado' => 'rechazado']) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                                    </form>
                                @endif

                                <!-- Botón para reportar -->
                                <a href="{{ route('reportes.create', $intercambio->id) }}" class="btn btn-warning btn-sm">Reportar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('intercambios.create') }}" class="btn btn-primary">Crear nuevo intercambio</a>
    </div>
@endsection
