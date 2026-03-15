@extends('layout')
@section('content')

<div class="container">
    <h2>Crear Elemento</h2>

    <form action="{{ route('elementos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <select name="tipo_id" class="form-control">
                <option value="">Seleccione</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control">
        </div>

        <div class="mb-3">
            <label>Serial / Placa SENA</label>
            <input type="text" name="serial_placa_sena" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection