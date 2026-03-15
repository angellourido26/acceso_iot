@extends('layout')

@section('content')

<h2 class="mb-4">Gestión de Inventario</h2>

<div class="row g-4">
    <div class="col-md-6">
        <a href="{{ route('elementos.index') }}" style="text-decoration:none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-box fs-1 text-success"></i>
                    <h4 class="mt-3">Elementos</h4>
                    <p class="text-muted">Administrar elementos del inventario</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="{{ route('tipo_elemento.index') }}" style="text-decoration:none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-tags fs-1 text-success"></i>
                    <h4 class="mt-3">Tipos de Elementos</h4>
                    <p class="text-muted">Administrar tipos de inventario</p>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection