<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white flex flex-col items-center justify-center h-screen">

<!-- Contenedor principal -->
<div class="bg-gray-800 p-8 rounded-lg shadow-md max-w-lg text-center">
    <h1 class="text-3xl font-bold mb-4">Bienvenido, {{ Auth::user()->name }}!</h1>
    <p class="text-lg mb-6">Has iniciado sesión correctamente.</p>

    <!-- Botones -->
    <div class="flex flex-col gap-4">
        <!-- Botón para ver personajes -->
        <a href="{{ route('personajes.index') }}" class="bg-blue-500 px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
            Ver Personajes
        </a>

        <!-- Formulario de Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 px-6 py-2 rounded-md hover:bg-red-600 transition duration-300">
                Cerrar sesión
            </button>
        </form>
    </div>
</div>

</body>
</html>
