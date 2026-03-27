@extends('layout')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestión de Elementos</h2>
    <a href="{{ route('elementos.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nuevo Elemento
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <table id="tablaElementos" class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Ambiente</th>
                    <th>Estado</th>
                    <th>Serial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($elementos as $elemento)
                    <tr>
                        <td>{{ $elemento->nombre }}</td>
                        <td>{{ $elemento->tipo?->nombre }}</td>
                        <td>{{ $elemento->ambiente?->nombre }}</td>
                        <td>{{ $elemento->estado }}</td>
                        <td>{{ $elemento->serial_placa_sena }}</td>
                        <td>
                            <a href="{{ route('elementos.edit', $elemento->id) }}"
                            class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('elementos.destroy', $elemento->id) }}" 
                                method="POST" 
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('¿Eliminar este elemento?')">
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
    $('#tablaElementos').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>