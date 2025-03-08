<x-layouts.layout>
    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ __('messages.app_name') }} - Lista de Personajes</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-900 text-white">

    <!-- Header -->
    <div class="max-w-6xl mx-auto mt-10 p-6 bg-gray-800 rounded-lg shadow-lg border border-cyan-500">
        <!-- Header: Título y Cerrar Sesión -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex space-x-4">
            </div>
        </div>

        <!-- Botón Crear Personaje -->
        <div class="mb-6">
            <a href="{{ route('personajes.create') }}"
               class="px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-lg transition-all">
                {{ __('messages.create_operator') }}
            </a>
        </div>

        <!-- Lista de Personajes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($personajes as $personaje)
                <div class="bg-gray-700 border border-cyan-500 p-4 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-yellow-400">{{ $personaje->nombre }}</h2>
                    <p class="text-gray-300 text-sm uppercase">{{ ucfirst($personaje->tipo) }}</p>

                    <div class="mt-3">
                        <p><strong class="text-cyan-400">{{ __('messages.unit') }}</strong> {{ $personaje->unidad_especial }}</p>
                        <p><strong class="text-cyan-400">{{ __('messages.life') }}</strong> {{ $personaje->vida }} |
                            <strong class="text-cyan-400">{{ __('messages.speed') }}</strong> {{ $personaje->velocidad }}</p>
                    </div>

                    <!-- Armas -->
                    <h3 class="text-xl font-semibold text-yellow-400 mt-3">{{ __('messages.weapon') }}</h3>
                    <ul class="text-gray-300">
                        @foreach ($personaje->armas as $arma)
                            <li class="mt-1">🔹 {{ $arma->nombre }} - <span class="text-cyan-400">{{ $arma->tipo }}</span>
                                ({{ __('messages.damage') }}: {{ $arma->daño }})</li>
                        @endforeach
                    </ul>

                    <!-- Botones de Acción -->
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('personajes.edit', $personaje) }}"
                           class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold rounded-lg transition-all">
                            {{ __('messages.edit') }}
                        </a>
                        <form action="{{ route('personajes.destroy', $personaje) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white font-bold rounded-lg transition-all"
                                    onclick="return confirm('{{ __('messages.are_you_sure') }}')">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </html>
</x-layouts.layout>
