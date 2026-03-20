@extends('layout')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<form method="GET">

    <label>Filtrar por fecha</label>
        <input type="date" name="fecha" value="{{ $fecha }}">
    <button class="btn btn-success">
        Filtrar
    </button>

<table id="tablaLogs" class="table table-striped">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Documento</th>
            <th>Ambiente</th>
            <th>Método</th>
            <th>Acción</th>
            <th>Fecha</th>
        </tr>
    </thead>

    <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->usuario->nombre }}</td>
                <td>{{ $log->usuario->numero_documento }}</td>
                <td>{{ $log->ambiente->nombre }}</td>
                <td>{{ $log->metodo->tipo_metodo }}</td>
                <td>{{ $log->accion }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
    </tbody>

</table>
</form>

@endsection

<script>
    $(document).ready(function(){
        $('#tablaLogs').DataTable();
    });
</script>