@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Crear nuevo intercambio</h1>

        <form action="{{ route('intercambios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ofertante_id">Ofertante</label>
                <!-- Solo se muestra el usuario autenticado y está deshabilitado -->
                <select name="ofertante_id" id="ofertante_id" class="form-control" disabled>
                    <option value="{{ $usuarioAutenticado->id }}" selected>{{ $usuarioAutenticado->name }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="receptor_id">Receptor</label>
                <select name="receptor_id" id="receptor_id" class="form-control">
                    @foreach ($usuarios as $usuario)
                        <!-- Excluye al usuario autenticado de ser receptor -->
                        @if ($usuario->id !== $usuarioAutenticado->id)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="juego_ofrecido_id">Juego Ofrecido</label>
                <select name="juego_ofrecido_id" id="juego_ofrecido_id" class="form-control">
                    @foreach ($juegos as $juego)
                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="juego_solicitado_id">Juego Solicitado</label>
                <select name="juego_solicitado_id" id="juego_solicitado_id" class="form-control">
                    @foreach ($todosLosJuegos as $juego)
                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Crear Intercambio</button>
        </form>
    </div>
@endsection
