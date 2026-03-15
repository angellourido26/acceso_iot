@extends('layout')
@section('content')

<div class="container">
    <h2>Crear Tipo de Elemento</h2>

    <form action="{{ route('tipo_elemento.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipo_elemento.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </form>
</div>

@endsection