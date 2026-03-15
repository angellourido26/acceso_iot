@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Editar Ambiente</h2>
    <a href="{{ route('ambientes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('ambientes.update', $ambiente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"
                       name="nombre"
                       id="nombre"
                       class="form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre', $ambiente->nombre) }}"
                       maxlength="100">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text"
                       name="ubicacion"
                       id="ubicacion"
                       class="form-control @error('ubicacion') is-invalid @enderror"
                       value="{{ old('ubicacion', $ambiente->ubicacion) }}"
                       maxlength="50">
                @error('ubicacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror">
                    <option value="">-- Seleccionar --</option>
                    <option value="Activo"        {{ old('estado', $ambiente->estado) == 'Activo'        ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo"      {{ old('estado', $ambiente->estado) == 'Inactivo'      ? 'selected' : '' }}>Inactivo</option>
                    <option value="Mantenimiento" {{ old('estado', $ambiente->estado) == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="area_id" class="form-label">Área</label>
                <select name="area_id" id="area_id" class="form-select @error('area_id') is-invalid @enderror">
                    <option value="">-- Sin área --</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id', $ambiente->area_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('area_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">
                <i class="bi bi-save"></i> Actualizar
            </button>
        </form>
    </div>
</div>

@endsection