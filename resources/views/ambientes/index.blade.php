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
        <form method="GET" class="mb-3">
            <div class="row">

                <div class="col-md-4">

                    <label>Estado</label>
                    <select name="estado" class="form-control">
                        <option value="">Todos</option>
                        <option value="Activo" {{ request('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ request('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="Mantenimiento" {{ request('estado') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                    </select>

                </div>

                <div class="col-md-4">
                    <label>Área</label>
                    <select name="area_id" class="form-control">
                        <option value="">Todas</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                                {{ $area->nombre }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-success w-100">
                        Filtrar
                    </button>

                </div>

            </div>
        </form>
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
                @foreach($ambientes as $ambiente)
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
    $('#tablaAmbientes').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            emptyTable: "Los datos ingresados no coinciden",
            zeroRecords: "No se encontraron resultados con ese filtro"
        },
        searching: false,
        lengthMenu: [5, 10, 25, 50]
    });
});
</script>