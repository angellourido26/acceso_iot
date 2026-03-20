@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nuevo Usuario</h2>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

<div class="card shadow">
<div class="card-body">

<form method="POST" action="{{ route('usuarios.store') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2">
    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2">
    <input type="email" name="correo" placeholder="Correo" class="form-control mb-2">
    <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2">
    <select name="tipo_documento" class="form-control mb-2">
        <option value="">Tipo Documento</option>
        <option value="CC">Cédula</option>
        <option value="TI">Tarjeta Identidad</option>
        <option value="CE">Cédula Extranjería</option>
    </select>
    <input type="text" name="numero_documento" placeholder="Número de documento" class="form-control mb-2">
    <input type="text" name="telefono" placeholder="Teléfono" class="form-control mb-2">
    <select name="rol_id" class="form-control mb-2">
        <option value="">Seleccione Rol</option>
        @foreach($roles as $rol)
            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
        @endforeach
    </select>
    <select name="area_id" class="form-control mb-2">
        <option value="">Seleccione Área</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
        @endforeach
    </select>
    <button class="btn btn-success">Guardar</button>

</form>

</div>
</div>

@endsection