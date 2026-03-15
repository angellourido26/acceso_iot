@extends('layout')
@section('content')

<div class="container">
    <h2>Editar Elemento</h2>

    <form action="{{ route('elementos.update', $elemento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" 
                   name="nombre" 
                   class="form-control"
                   value="{{ $elemento->nombre }}">
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <select name="tipo_id" class="form-control">
                <option value="">Seleccione</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}"
                        {{ $elemento->tipo_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Ambiente</label>
            <select name="ambiente_id" class="form-control">
                <option value="">Seleccione</option>
                @foreach($ambientes as $ambiente)
                    <option value="{{ $ambiente->id }}"
                        {{ $elemento->ambiente_id == $ambiente->id ? 'selected' : '' }}>
                        {{ $ambiente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" 
                   name="estado" 
                   class="form-control"
                   value="{{ $elemento->estado }}">
        </div>

        <div class="mb-3">
            <label>Serial / Placa SENA</label>
            <input type="text" 
                   name="serial_placa_sena" 
                   class="form-control"
                   value="{{ $elemento->serial_placa_sena }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('elementos.index') }}" class="btn btn-secondary">
            Volver
        </a>

    </form>
</div>

@endsection