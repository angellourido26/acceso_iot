@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestión de Ambientes</h2>
    <a href="{{ route('ambientes.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nuevo Ambiente
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <table id="tablaAmbientes" class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Estado</th>
                    <th>Área</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ambientes as $ambiente)
                    <tr>
                        <td>{{ $ambiente->id }}</td>
                        <td>{{ $ambiente->nombre }}</td>
                        <td>{{ $ambiente->ubicacion }}</td>
                        <td>{{ $ambiente->estado }}</td>
                        <td>{{ $ambiente->area->nombre ?? '—' }}</td>
                        <td>{{ $ambiente->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('ambientes.edit', $ambiente->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('ambientes.destroy', $ambiente->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar este ambiente?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay ambientes registrados</td>
                    </tr>
                @endforelse
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
    $('#tablaAmbientes').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>