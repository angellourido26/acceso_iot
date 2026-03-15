@extends('layout')

@section('content')

<h2 class="mb-4">Gestión de Usuarios</h2>

<div class="row g-4">
    <div class="col-md-6">
        <a href="{{ route('usuarios.index') }}" style="text-decoration:none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-person fs-1 text-success"></i>
                    <h4 class="mt-3">Usuarios</h4>
                    <p class="text-muted">Administrar usuarios del sistema</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="{{ route('roles.index') }}" style="text-decoration:none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-shield-lock fs-1 text-success"></i>
                    <h4 class="mt-3">Roles</h4>
                    <p class="text-muted">Administrar roles del sistema</p>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection