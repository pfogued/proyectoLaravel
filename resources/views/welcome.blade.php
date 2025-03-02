<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Rainbow Six</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #1a1a1a;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            font-size: 2.5em;
        }
        p {
            font-size: 1.2em;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2em;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #28a745;
        }
        .btn-secondary:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bienvenido a Rainbow Six</h1>
    <p>Explora y administra los personajes de este increíble juego.</p>

    @auth
        <!-- Si el usuario está autenticado, muestra el botón para ver los personajes -->
        <a href="{{ route('personajes.index') }}" class="btn">Ver Personajes</a>
    @else
        <!-- Si el usuario no está autenticado, muestra los botones de login y registro -->
        <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Registrar</a>
    @endauth
</div>

</body>
</html>
