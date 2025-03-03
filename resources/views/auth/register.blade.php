<x-layouts.layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-900">
        <div class="bg-gray-800 p-12 rounded-2xl shadow-2xl w-full max-w-3xl border border-cyan-500">
            <!-- Título -->
            <h2 class="text-4xl font-bold text-center text-yellow-400 mb-6">Crear Cuenta</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nombre -->
                <div class="flex flex-col">
                    <x-input-label for="name" :value="__('Nombre')" class="text-lg text-white" />
                    <x-text-input id="name" class="w-full p-3 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:ring-2 focus:ring-cyan-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>

                <!-- Email Address -->
                <div class="flex flex-col">
                    <x-input-label for="email" :value="__('Email')" class="text-lg text-white" />
                    <x-text-input id="email" class="w-full p-3 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:ring-2 focus:ring-cyan-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div class="flex flex-col">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-lg text-white" />
                    <x-text-input id="password" class="w-full p-3 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:ring-2 focus:ring-cyan-400" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div class="flex flex-col">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-lg text-white" />
                    <x-text-input id="password_confirmation" class="w-full p-3 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:ring-2 focus:ring-cyan-400" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>

                <!-- Enlace a Login -->
                <div class="flex items-center justify-between">
                    <a class="underline text-lg text-yellow-400 hover:text-yellow-300" href="{{ route('login') }}">
                        {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                    </a>
                </div>

                <!-- Botón -->
                <div class="text-center">
                    <button type="submit"
                            class="w-full py-3 bg-green-600 hover:bg-green-500 text-white font-bold text-xl rounded-lg transition-all">
                        Crear Cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
