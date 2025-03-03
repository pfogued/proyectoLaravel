<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personaje</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">

<div class="max-w-6xl mx-auto mt-10 p-6 bg-gray-800 rounded-lg shadow-lg border border-cyan-500">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-yellow-400">Editar Operador</h1>
        <a href="{{ route('personajes.index') }}"
           class="px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-lg transition-all">
            Volver a la Lista
        </a>
    </div>

    <!-- Mostrar errores -->
    @if ($errors->any())
        <div class="bg-red-700 text-white p-4 mb-6 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario de edición -->
    <form action="{{ route('personajes.update', $personaje) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="text-xl font-semibold text-cyan-400">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $personaje->nombre }}"
                   class="w-full p-2 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>

        <div class="mb-4">
            <label for="tipo" class="text-xl font-semibold text-cyan-400">Tipo:</label>
            <select id="tipo" name="tipo"
                    class="w-full p-2 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                <option value="atacante" {{ $personaje->tipo == 'atacante' ? 'selected' : '' }}>Atacante</option>
                <option value="defensor" {{ $personaje->tipo == 'defensor' ? 'selected' : '' }}>Defensor</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="unidad_especial" class="text-xl font-semibold text-cyan-400">Unidad Especial:</label>
            <input type="text" id="unidad_especial" name="unidad_especial" value="{{ $personaje->unidad_especial }}"
                   class="w-full p-2 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>

        <div class="mb-4">
            <label for="vida" class="text-xl font-semibold text-cyan-400">Vida:</label>
            <input type="number" id="vida" name="vida" value="{{ $personaje->vida }}"
                   class="w-full p-2 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>

        <div class="mb-4">
            <label for="velocidad" class="text-xl font-semibold text-cyan-400">Velocidad:</label>
            <input type="number" id="velocidad" name="velocidad" value="{{ $personaje->velocidad }}"
                   class="w-full p-2 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>

        <h2 class="text-2xl font-bold text-yellow-400 mt-6 mb-4">Editar Armas</h2>

        @foreach ($personaje->armas as $index => $arma)
            <div class="mb-6 bg-gray-700 p-4 rounded-lg shadow-md border border-cyan-500">
                <input type="hidden" name="armas[{{ $index }}][id]" value="{{ $arma->id }}">

                <div class="mb-4">
                    <label for="armas[{{ $index }}][nombre]" class="text-lg font-semibold text-cyan-400">Nombre:</label>
                    <input type="text" name="armas[{{ $index }}][nombre]" value="{{ $arma->nombre }}"
                           class="w-full p-2 mt-2 bg-gray-600 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                </div>

                <div class="mb-4">
                    <label for="armas[{{ $index }}][tipo]" class="text-lg font-semibold text-cyan-400">Tipo:</label>
                    <input type="text" name="armas[{{ $index }}][tipo]" value="{{ $arma->tipo }}"
                           class="w-full p-2 mt-2 bg-gray-600 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                </div>

                <div class="mb-4">
                    <label for="armas[{{ $index }}][daño]" class="text-lg font-semibold text-cyan-400">Daño:</label>
                    <input type="number" name="armas[{{ $index }}][daño]" value="{{ $arma->daño }}"
                           class="w-full p-2 mt-2 bg-gray-600 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                </div>

                <div class="mb-4">
                    <label for="armas[{{ $index }}][cadencia]" class="text-lg font-semibold text-cyan-400">Cadencia:</label>
                    <input type="number" name="armas[{{ $index }}][cadencia]" value="{{ $arma->cadencia }}"
                           class="w-full p-2 mt-2 bg-gray-600 text-white rounded-lg border border-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                </div>

                <input type="hidden" name="personaje_id[{{$index}}][personaje_id]" value="{{$personaje->id}}">
            </div>
        @endforeach

        <div class="mt-6">
            <button type="submit" class="w-full px-6 py-3 bg-green-600 hover:bg-green-500 text-white font-bold rounded-lg transition-all">
                Actualizar Operador
            </button>
        </div>
    </form>
</div>

</body>
</html>

