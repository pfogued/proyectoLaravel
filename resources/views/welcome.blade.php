<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Rainbow Six</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white flex flex-col justify-center items-center h-screen">

<div class="max-w-lg text-center">
    <h1 class="text-4xl font-bold">Bienvenido a Rainbow Six</h1>
    <p class="text-lg mt-4">Explora y administra los personajes de este increíble juego.</p>

    <div class="mt-6 space-x-4">
        @auth
            <!-- Si el usuario está autenticado, muestra el botón para ver los personajes -->
            <a href="{{ route('personajes.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Ver Personajes
            </a>
        @else
            <!-- Si el usuario no está autenticado, muestra los botones de login y registro -->
            <a href="{{ route('login') }}" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition duration-300">
                Iniciar Sesión
            </a>
            <a href="{{ route('register') }}" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition duration-300">
                Registrar
            </a>
        @endauth
    </div>
    <div class="dropdown-content">
        <form action="{{ route('language', 'es') }}" method="GET" style="display:inline;">
            <button id="top" type="submit">🇪🇸 {{ __('messages.es') }}</button>
        </form>
        <form action="{{ route('language', 'en') }}" method="GET" style="display:inline;">
            <button id="middle" type="submit">🇬🇧 {{ __('messages.en') }}</button>
        </form>
        <form id="bottom" action="{{ route('language', 'fr') }}" method="GET" style="display:inline;">
            <button id="bottom" type="submit">🇫🇷 {{ __('messages.fr') }}</button>
        </form>
    </div>
</div>

</body>
</html>
