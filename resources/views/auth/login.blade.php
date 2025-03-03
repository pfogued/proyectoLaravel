<x-layouts.layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-900" style="margin-top: -260px">
        <div class="bg-gray-800 p-12 rounded-2xl shadow-2xl w-full max-w-3xl border border-cyan-500">
            <!-- Título -->
            <h2 class="text-4xl font-bold text-center text-yellow-400 mb-6">Iniciar Sesión</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="flex flex-col">
                    <x-input-label for="email" :value="__('Email')" class="text-lg  text-white" />
                    <x-text-input id="email" class="w-full p-3 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:ring-2 focus:ring-cyan-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div class="flex flex-col">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-lg text-white" />
                    <x-text-input id="password" class="w-full p-3 mt-2 bg-gray-700 text-white rounded-lg border border-cyan-500 focus:ring-2 focus:ring-cyan-400"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-lg text-gray-300">{{ __('Recuérdame') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-lg text-yellow-400 hover:underline" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                <!-- Botón -->
                <div class="text-center">
                    <button type="submit"
                            class="w-full py-3 bg-green-600 hover:bg-green-500 text-white font-bold text-xl rounded-lg transition-all">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
