@extends('layout')

@section('content')

<h2 class="mb-4">Editar Usuario</h2>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre"
                           value="{{ $usuario->nombre }}"
                           class="form-control @error('nombre') is-invalid @enderror">

                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellido"
                           value="{{ $usuario->apellido }}"
                           class="form-control @error('apellido') is-invalid @enderror">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo"
                           value="{{ $usuario->correo }}"
                           class="form-control @error('correo') is-invalid @enderror">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono"
                           value="{{ $usuario->telefono }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo Documento</label>
                    <input type="text" name="tipo_documento"
                           value="{{ $usuario->tipo_documento }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Número Documento</label>
                    <input type="text" name="numero_documento"
                           value="{{ $usuario->numero_documento }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Estado</label>

                    <select name="estado" class="form-control">

                        <option value="1"
                        {{ $usuario->estado == '1' ? 'selected' : '' }}>
                        Activo
                        </option>

                        <option value="0"
                        {{ $usuario->estado == '0' ? 'selected' : '' }}>
                        Inactivo
                        </option>

                    </select>
                </div>

                {{-- Rol --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Rol</label>

                    <select name="rol_id" class="form-control">

                        <option value="">Seleccione Rol</option>

                        @foreach($roles as $rol)

                        <option value="{{ $rol->id }}"
                        {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>

                        {{ $rol->nombre }}

                        </option>

                        @endforeach

                    </select>
                </div>

                {{-- Área --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Área</label>

                    <select name="area_id" class="form-control">

                        <option value="">Seleccione Área</option>

                        @foreach($areas as $area)

                        <option value="{{ $area->id }}"
                        {{ $usuario->area_id == $area->id ? 'selected' : '' }}>

                        {{ $area->nombre }}

                        </option>

                        @endforeach

                    </select>
                </div>

            </div>

            <button type="submit" class="btn btn-success">
                Actualizar
            </button>

            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@endsection