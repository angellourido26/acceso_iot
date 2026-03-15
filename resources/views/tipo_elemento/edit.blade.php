@extends('layout')
@section('content')

<div class="container">
    <h2>Editar Tipo de Elemento</h2>

    <form action="{{ route('tipo_elemento.update', $tipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" 
                   name="nombre" 
                   class="form-control"
                   value="{{ $tipo->nombre }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tipo_elemento.index') }}" class="btn btn-secondary">
            Volver
        </a>
    </form>
</div>

@endsection