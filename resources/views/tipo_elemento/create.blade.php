@extends('layout')
@section('content')

<div class="container">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nuevo Tipo de Elemento</h2>
    <a href="{{ route('tipo_elemento.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

    <form action="{{ route('tipo_elemento.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

@endsection