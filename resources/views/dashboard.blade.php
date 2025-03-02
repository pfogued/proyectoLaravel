<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Botón de Logout -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
    </form>
</head>
<body>
<div class="container">
    <h1>Bienvenido al Dashboard, {{ Auth::user()->name }}!</h1>
    <p>Has iniciado sesión correctamente.</p>


    <!-- Botón para ver personajes -->
    <a href="{{ route('personajes.index') }}" class="btn btn-primary">Ver Personajes</a>
</div>
</body>
</html>
