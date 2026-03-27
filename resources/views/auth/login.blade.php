<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login CEAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card p-4 shadow" style="width:350px;">
        <h4 class="text-center mb-3">Iniciar Sesión</h4>

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <input type="email" name="correo" value="{{ old('correo') }}" placeholder="Correo" class="form-control mb-2">
            <input type="password" name="password" placeholder="Contraseña" class="form-control mb-3">

            <button class="btn btn-success w-100">Ingresar</button>
        </form>
    </div>
</div>

</body>
</html>