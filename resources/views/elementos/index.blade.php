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
        <table class="table table-bordered table-hover">
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
                            class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection