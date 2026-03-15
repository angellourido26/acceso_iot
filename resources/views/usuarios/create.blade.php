@extends('layout')

@section('content')

<h2>Crear Usuario</h2>

<form method="POST" action="{{ route('usuarios.store') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2">
    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2">
    <input type="email" name="correo" placeholder="Correo" class="form-control mb-2">
    <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2">
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

@endsection