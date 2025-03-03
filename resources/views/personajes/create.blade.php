<x-layouts.layout>
    <!-- Aquí agregamos el enlace al archivo CSS de Tailwind -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Personaje</title>

        <!-- Asegúrate de que el archivo app.css de Tailwind esté cargado -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <div class="max-w-4xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-lg shadow-lg border border-cyan-500">
        <h1 class="text-3xl font-bold text-center text-yellow-400 mb-6">CREAR PERSONAJE</h1>

        <form method="POST" action="{{ route('personajes.store') }}" class="space-y-4">
            @csrf
            @if($errors->any())
                <ul class="bg-red-500 text-white p-3 rounded">
                    @foreach($errors->all() as $error)
                        <li class="text-sm">⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-cyan-400">Nombre del Personaje</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required
                       class="w-full p-2 mt-1 bg-gray-800 border border-cyan-500 rounded-lg focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Tipo -->
            <div>
                <label for="tipo" class="block text-sm font-medium text-cyan-400">Tipo</label>
                <select id="tipo" name="tipo" required
                        class="w-full p-2 mt-1 bg-gray-800 border border-cyan-500 rounded-lg focus:ring-yellow-400 focus:border-yellow-400">
                    <option value="Atacante" {{ old('tipo') == 'Atacante' ? 'selected' : '' }}>Atacante</option>
                    <option value="Defensor" {{ old('tipo') == 'Defensor' ? 'selected' : '' }}>Defensor</option>
                </select>
            </div>

            <!-- Unidad Especial -->
            <div>
                <label for="unidad_especial" class="block text-sm font-medium text-cyan-400">Unidad Especial</label>
                <input type="text" id="unidad_especial" name="unidad_especial" value="{{ old('unidad_especial') }}" required
                       class="w-full p-2 mt-1 bg-gray-800 border border-cyan-500 rounded-lg focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Vida -->
            <div>
                <label for="vida" class="block text-sm font-medium text-cyan-400">Vida</label>
                <input type="number" id="vida" name="vida" value="{{ old('vida') }}" required
                       class="w-full p-2 mt-1 bg-gray-800 border border-cyan-500 rounded-lg focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Velocidad -->
            <div>
                <label for="velocidad" class="block text-sm font-medium text-cyan-400">Velocidad</label>
                <input type="number" id="velocidad" name="velocidad" value="{{ old('velocidad') }}" required
                       class="w-full p-2 mt-1 bg-gray-800 border border-cyan-500 rounded-lg focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Armas -->
            <div>
                <h3 class="text-xl font-semibold text-yellow-400">ARMAS</h3>
                <div id="armas-container">
                    <div class="p-4 bg-gray-800 border border-cyan-500 rounded-lg mt-4">
                        <div>
                            <label class="text-sm font-medium text-cyan-400">Nombre del Arma</label>
                            <input type="text" name="armas[0][nombre]" required
                                   class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                        </div>
                        <div class="mt-2">
                            <label class="text-sm font-medium text-cyan-400">Tipo</label>
                            <input type="text" name="armas[0][tipo]" required
                                   class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                        </div>
                        <div class="mt-2">
                            <label class="text-sm font-medium text-cyan-400">Daño</label>
                            <input type="number" name="armas[0][daño]" required
                                   class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                        </div>
                        <div class="mt-2">
                            <label class="text-sm font-medium text-cyan-400">Cadencia</label>
                            <input type="number" name="armas[0][cadencia]" required
                                   class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                        </div>
                    </div>
                </div>

                <button type="button" id="add-arma"
                        class="mt-4 w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 py-2 px-4 rounded-lg transition-all duration-300">
                    + Añadir Otra Arma
                </button>
            </div>

            <!-- Botón de Registrar -->
            <button type="submit"
                    class="w-full bg-cyan-500 hover:bg-cyan-400 text-gray-900 py-3 text-lg font-bold rounded-lg transition-all duration-300">
                Registrar Personaje
            </button>
        </form>
    </div>

    <script>
        let armaIndex = 1;
        document.getElementById('add-arma').addEventListener('click', function() {
            let container = document.getElementById('armas-container');
            let newArma = document.createElement('div');
            newArma.classList.add('p-4', 'bg-gray-800', 'border', 'border-cyan-500', 'rounded-lg', 'mt-4');

            newArma.innerHTML = `
                <div>
                    <label class="text-sm font-medium text-cyan-400">Nombre del Arma</label>
                    <input type="text" name="armas[${armaIndex}][nombre]" required
                        class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                </div>
                <div class="mt-2">
                    <label class="text-sm font-medium text-cyan-400">Tipo</label>
                    <input type="text" name="armas[${armaIndex}][tipo]" required
                        class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                </div>
                <div class="mt-2">
                    <label class="text-sm font-medium text-cyan-400">Daño</label>
                    <input type="number" name="armas[${armaIndex}][daño]" required
                        class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                </div>
                <div class="mt-2">
                    <label class="text-sm font-medium text-cyan-400">Cadencia</label>
                    <input type="number" name="armas[${armaIndex}][cadencia]" required
                        class="w-full p-2 mt-1 bg-gray-700 border border-cyan-500 rounded-lg">
                </div>
            `;

            container.appendChild(newArma);
            armaIndex++;
        });
    </script>
</x-layouts.layout>
