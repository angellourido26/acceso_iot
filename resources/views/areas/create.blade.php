@extends('layout')

@section('content')

<h2 class="mb-4">Crear Nueva Área</h2>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('areas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Área</label>
                <input type="text" name="nombre" 
                       class="form-control @error('nombre') is-invalid @enderror"
                       placeholder="Ej: CEAI, CGTS, etc..">

                @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('areas.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@endsection