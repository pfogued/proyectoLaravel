<x-guest-layout>
    <form method="POST" action="{{ route('personajes.store') }}">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>

            @endforeach
        @endif
        <!-- Nombre del Personaje -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Tipo -->
        <div class="mt-4">
            <x-input-label for="tipo" :value="__('Tipo')" />
            <select id="tipo" name="tipo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="Atacante" {{ old('tipo') == 'Atacante' ? 'selected' : '' }}>Atacante</option>
                <option value="Defensor" {{ old('tipo') == 'Defensor' ? 'selected' : '' }}>Defensor</option>
            </select>
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
        </div>


        <!-- Unidad Especial -->
        <div class="mt-4">
            <x-input-label for="unidad_especial" :value="__('Unidad Especial')" />
            <x-text-input id="unidad_especial" class="block mt-1 w-full" type="text" name="unidad_especial" :value="old('unidad_especial')" required autocomplete="unidad_especial" />
            <x-input-error :messages="$errors->get('unidad_especial')" class="mt-2" />
        </div>

        <!-- Vida -->
        <div class="mt-4">
            <x-input-label for="vida" :value="__('Vida')" />
            <x-text-input id="vida" class="block mt-1 w-full" type="number" name="vida" :value="old('vida')" required />
            <x-input-error :messages="$errors->get('vida')" class="mt-2" />
        </div>

        <!-- Velocidad -->
        <div class="mt-4">
            <x-input-label for="velocidad" :value="__('Velocidad')" />
            <x-text-input id="velocidad" class="block mt-1 w-full" type="number" name="velocidad" :value="old('velocidad')" required />
            <x-input-error :messages="$errors->get('velocidad')" class="mt-2" />
        </div>

        <!-- Armas -->
        <div class="mt-4">
            <h3 class="text-lg font-semibold">Armas</h3>
            <div id="armas-container">
                <div class="arma mt-4" id="arma-0">
                    <div class="flex">
                        <!-- Nombre del arma -->
                        <div class="mr-4">
                            <x-input-label for="armas[0][nombre]" :value="__('Nombre del Arma')" />
                            <x-text-input id="armas[0][nombre]" class="block mt-1 w-full" type="text" name="armas[0][nombre]" :value="old('armas.0.nombre')" required />
                            <x-input-error :messages="$errors->get('armas.0.nombre')" class="mt-2" />
                        </div>

                        <!-- Tipo del arma -->
                        <div class="mr-4">
                            <x-input-label for="armas[0][tipo]" :value="__('Tipo del Arma')" />
                            <x-text-input id="armas[0][tipo]" class="block mt-1 w-full" type="text" name="armas[0][tipo]" :value="old('armas.0.tipo')" required />
                            <x-input-error :messages="$errors->get('armas.0.tipo')" class="mt-2" />
                        </div>

                        <!-- Daño del arma -->
                        <div class="mr-4">
                            <x-input-label for="armas[0][daño]" :value="__('Daño del Arma')" />
                            <x-text-input id="armas[0][daño]" class="block mt-1 w-full" type="number" name="armas[0][daño]" :value="old('armas.0.daño')" required />
                            <x-input-error :messages="$errors->get('armas.0.daño')" class="mt-2" />
                        </div>

                        <!-- Cadencia del arma -->
                        <div>
                            <x-input-label for="armas[0][cadencia]" :value="__('Cadencia del Arma')" />
                            <x-text-input id="armas[0][cadencia]" class="block mt-1 w-full" type="number" name="armas[0][cadencia]" :value="old('armas.0.cadencia')" required />
                            <x-input-error :messages="$errors->get('armas.0.cadencia')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón para agregar más armas -->
            <div class="mt-4">
                <button type="button" id="add-arma" class="bg-blue-500 text-white px-4 py-2 rounded">Añadir Otra Arma</button>
            </div>
        </div>

        <!-- Botón de Submit -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Registrar Personaje') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        let armaIndex = 1; // Comienza con el primer arma
        document.getElementById('add-arma').addEventListener('click', function() {
            let container = document.getElementById('armas-container');
            let newArma = document.createElement('div');
            newArma.classList.add('arma', 'mt-4');
            newArma.id = 'arma-' + armaIndex;

            // Crea los campos para el arma
            newArma.innerHTML = `
                <div class="flex">
                    <div class="mr-4">
                        <x-input-label for="armas[${armaIndex}][nombre]" :value="__('Nombre del Arma')" />
                        <x-text-input id="armas[${armaIndex}][nombre]" class="block mt-1 w-full" type="text" name="armas[${armaIndex}][nombre]" required />
                        <x-input-error :messages="$errors->get('armas.${armaIndex}.nombre')" class="mt-2" />
                    </div>

                    <div class="mr-4">
                        <x-input-label for="armas[${armaIndex}][tipo]" :value="__('Tipo del Arma')" />
                        <x-text-input id="armas[${armaIndex}][tipo]" class="block mt-1 w-full" type="text" name="armas[${armaIndex}][tipo]" required />
                        <x-input-error :messages="$errors->get('armas.${armaIndex}.tipo')" class="mt-2" />
                    </div>

                    <div class="mr-4">
                        <x-input-label for="armas[${armaIndex}][daño]" :value="__('Daño del Arma')" />
                        <x-text-input id="armas[${armaIndex}][daño]" class="block mt-1 w-full" type="number" name="armas[${armaIndex}][daño]" required />
                        <x-input-error :messages="$errors->get('armas.${armaIndex}.daño')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="armas[${armaIndex}][cadencia]" :value="__('Cadencia del Arma')" />
                        <x-text-input id="armas[${armaIndex}][cadencia]" class="block mt-1 w-full" type="number" name="armas[${armaIndex}][cadencia]" required />
                        <x-input-error :messages="$errors->get('armas.${armaIndex}.cadencia')" class="mt-2" />
                    </div>
                </div>
            `;

            // Agrega el nuevo formulario de arma
            container.appendChild(newArma);
            armaIndex++;
        });
    </script>
</x-guest-layout>
