@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nueva Área</h2>
    <a href="{{ route('areas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('areas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Área</label>
                <input type="text" name="nombre" 
                       class="form-control @error('nombre') is-invalid @enderror"
                       placeholder="Ej: Electricidad, TI, etc..">

                @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                Guardar
            </button>

        </form>

    </div>
</div>

@endsection