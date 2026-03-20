<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CEAI - Control IoT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #F4F6F9;
        }

        .sidebar {
            height: 100vh;
            background-color: #2E7D32;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #39A900;
            border-radius: 8px;
        }

        .sidebar .nav-link.active {
            background-color: #39A900;
            border-radius: 8px;
        }

        .navbar-custom {
            background-color: #39A900;
        }

        .card-custom {
            border-left: 5px solid #39A900;
        }
        .hover-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        {{-- Sidebar --}}
        <div class="col-md-2 sidebar p-4">
            <h4 class="text-center mb-4">
                <i class="bi bi-cpu"></i> CEAI IoT
            </h4>

            <ul class="nav flex-column gap-2">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                    href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('areas.*') ? 'active' : '' }}" 
                    href="{{ route('areas.index') }}">
                        <i class="bi bi-door-open"></i> Áreas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ambientes.*') ? 'active' : '' }}" 
                    href="{{ route('ambientes.index') }}">
                        <i class="bi bi-shield-lock "></i> Ambientes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" 
                    href="{{ route('usuarios.menu') }}">
                        <i class="bi bi-people"></i> Usuarios
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('inventario.*') ? 'active' : '' }}" 
                    href="{{ route('inventario.menu') }}">
                        <i class="bi bi-box-seam"></i> Inventario
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('logs.*') ? 'active' : '' }}" 
                    href="{{ route('logs.index') }}">
                        <i class="bi bi-clock-history"></i> Logs
                    </a>
                </li>

            </ul>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10">

            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg navbar-custom text-white px-4">
                <div class="container-fluid">
                    <span class="navbar-brand text-white">
                        Sistema Inteligente de Control y Trazabilidad
                    </span>

                <div class="d-flex align-items-center gap-3">
                    @if(session()->has('usuario'))
                        <div class="d-flex align-items-center gap-3">
                            <span>
                                <i class="bi bi-person-circle"></i> 
                                {{ session('usuario')->nombre }}
                            </span>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-light">
                                    <i class="bi bi-box-arrow-right"></i> Salir
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
                </div>
            </nav>

            {{-- Contenido dinámico --}}
            <div class="p-4">
                @yield('content')
            </div>

        </div>
    </div>
</div>

</body>
</html>