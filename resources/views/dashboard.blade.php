@extends('layout')

@section('content')

<h2 class="mb-4">Panel de Control - CEAI</h2>

<div class="row g-4">

    <div class="col-md-3">
        <a href="{{ route('areas.index') }}" style="text-decoration: none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-building fs-1 text-success"></i>
                    <h5 class="mt-3">Gestión de Áreas</h5>
                    <p class="text-muted">Administrar áreas institucionales</p>

                    <hr>

                    <h4 class="text-success">{{ $totalAreas }}</h4>
                    <small class="text-muted">Áreas registradas</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('ambientes.index') }}" style="text-decoration: none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-building fs-1 text-success"></i>
                    <h5 class="mt-3">Ambientes</h5>
                    <p class="text-muted">Control de acceso</p>

                    <hr>

                    <h4 class="text-success">{{ $totalAmbientes }}</h4>
                    <small class="text-muted">Ambientes registrados</small>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('usuarios.menu') }}" style="text-decoration:none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-building fs-1 text-success"></i>
                    <h5 class="mt-3">Usuarios</h5>
                    <p class="text-muted">Gestión de usuarios y roles</p>

                    <hr>

                    <p class="mb-1">
                        <strong class="text-success">{{ $totalUsuarios }}</strong> Usuarios
                    </p>

                    <p class="mb-0">
                        <strong class="text-success">{{ $totalRoles }}</strong> Roles
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('inventario.menu') }}" style="text-decoration:none;">
            <div class="card shadow card-custom h-100 hover-card">
                <div class="card-body text-center">
                    <i class="bi bi-building fs-1 text-success"></i>
                    <h5 class="mt-3">Inventario</h5>
                    <p class="text-muted">Elementos y tipos</p>

                    <hr>

                    <p class="mb-1">
                        <strong class="text-success">{{ $totalElementos }}</strong> Elementos
                    </p>

                    <p class="mb-0">
                        <strong class="text-success">{{ $totalTipos }}</strong> Tipos
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection