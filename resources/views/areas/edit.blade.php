@extends('layout')

@section('content')

<h2 class="mb-4">Editar Área</h2>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('areas.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre del Área</label>
                <input type="text" name="nombre" 
                       value="{{ $area->nombre }}"
                       class="form-control @error('nombre') is-invalid @enderror">

                @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('areas.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@endsection