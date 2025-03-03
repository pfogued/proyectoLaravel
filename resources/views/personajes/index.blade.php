<x-layouts.layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personajes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        function confirmarEliminacion(event) {
            event.preventDefault();
            if (confirm('¿Estás seguro de que quieres eliminar este personaje?')) {
                event.target.closest('form').submit();
            }
        }
    </script>
</head>
<body class="bg-gray-900 text-white">

<!-- Header -->
<div class="max-w-6xl mx-auto mt-10 p-6 bg-gray-800 rounded-lg shadow-lg border border-cyan-500">
    <!-- Header: Título y Cerrar Sesión -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-yellow-400">Rainbow Six</h1>
        <div class="flex space-x-4">
            <!-- Botón de Cerrar sesión -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg transition-all">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    <!-- Botón Crear Personaje -->
    <div class="mb-6">
        <a href="{{ route('personajes.create') }}"
           class="px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-lg transition-all">
            + Crear Operador
        </a>
    </div>

    <!-- Lista de Personajes -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($personajes as $personaje)
            <div class="bg-gray-700 border border-cyan-500 p-4 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-400">{{ $personaje->nombre }}</h2>
                <p class="text-gray-300 text-sm uppercase">{{ ucfirst($personaje->tipo) }}</p>

                <div class="mt-3">
                    <p><strong class="text-cyan-400">Unidad:</strong> {{ $personaje->unidad_especial }}</p>
                    <p><strong class="text-cyan-400">Vida:</strong> {{ $personaje->vida }} |
                        <strong class="text-cyan-400">Velocidad:</strong> {{ $personaje->velocidad }}</p>
                </div>

                <!-- Armas -->
                <h3 class="text-xl font-semibold text-yellow-400 mt-3">Armas:</h3>
                <ul class="text-gray-300">
                    @foreach ($personaje->armas as $arma)
                        <li class="mt-1">🔹 {{ $arma->nombre }} - <span class="text-cyan-400">{{ $arma->tipo }}</span>
                            (Daño: {{ $arma->daño }})</li>
                    @endforeach
                </ul>

                <!-- Botones de Acción -->
                <div class="mt-4 flex justify-between">
                    <a href="{{ route('personajes.edit', $personaje) }}"
                       class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold rounded-lg transition-all">
                        Editar
                    </a>
                    <form action="{{ route('personajes.destroy', $personaje) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white font-bold rounded-lg transition-all"
                                onclick="confirmarEliminacion(event)">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
</x-layouts.layout>
