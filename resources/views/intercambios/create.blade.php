@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Crear nuevo intercambio</h1>

        <form action="{{ route('intercambios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ofertante_id">Ofertante</label>
                <select name="ofertante_id" id="ofertante_id" class="form-control">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="receptor_id">Receptor</label>
                <select name="receptor_id" id="receptor_id" class="form-control">
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
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
                    @foreach ($juegos as $juego)
                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Crear Intercambio</button>
        </form>
    </div>
@endsection
