@extends('layout')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<div class="card shadow">
    <div class="card-body">
        <form method="GET">
        <div>
            <label>Filtrar por fecha</label>
                <input type="date" name="fecha" value="{{ $fecha }}">
            <button class="btn btn-success">
                Filtrar
            </button>
        </div>
        <br>

        <table id="tablaLogs" class="table table-bordered table-hover">
            <thead class="table-success">
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
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#tablaLogs').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>
{{-- <script>
    $(document).ready(function(){
        $('#tablaLogs').DataTable();
    });
</script> --}}