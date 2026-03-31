@extends('layout')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<div class="card shadow">
    <div class="card-body">
        <form method="GET">
        <div>
            <div>
                <label>Filtrar por fecha</label>
                <input type="date" name="fecha" value="{{ $fecha }}">
            </div>
            <br>

            <div>
                <label>Número de documento (CC)</label>
                <input type="text" name="documento" placeholder="C.C." value="{{ request('documento') }}">
                <br>
                <br>

                <label>Ambiente</label>
                <select name="ambiente" class="form-control">
                    <option value="">Todos</option>

                    @foreach($ambientes as $ambiente)
                        <option value="{{ $ambiente->id }}" {{ request('ambiente') == $ambiente->id ? 'selected' : '' }}>
                            {{ $ambiente->nombre }}
                        </option>
                    
                    @endforeach
                </select>
                <br>

                <label>Acción</label>
                <select name="accion" class="form-control">
                    <option value="">Todas</option>

                    @foreach($acciones as $accion)
                        <option value="{{ $accion }}"
                            {{ request('accion') == $accion ? 'selected' : '' }}>
                            {{ $accion }}
                        </option>
                    @endforeach
                </select>
                
            </div>

            <br>
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
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            emptyTable: "Los datos ingresados no coinciden",
            zeroRecords: "No se encontraron resultados con ese filtro"
        },
        searching: false,
        lengthMenu: [5, 10, 25, 50]
    });
});
</script>
{{-- <script>
    $(document).ready(function(){
        $('#tablaLogs').DataTable();
    });
</script> --}}