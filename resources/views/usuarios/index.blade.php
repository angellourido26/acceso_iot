@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestión de Usuarios</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nuevo Usuario
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <table id="tablaUsuarios" class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </thead>

        <tbody>

        @foreach($usuarios as $usuario)

        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->rol->nombre ?? 'Sin rol' }}</td>
            <td>{{ $usuario->area->nombre ?? 'Sin área' }}</td>
        <td>
            <a href="{{ route('usuarios.edit',$usuario->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar este usuario?')">
                        <i class="bi bi-trash"></i>
                    </button>
            </form>
        </td>
        </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#tablaUsuarios').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>