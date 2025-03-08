{{-- Header para móvil --}}
<header class="relative md:h-20 bg-gray-900 shadow-lg flex flex-col md:flex-row justify-between px-5 py-3 items-center border-b border-cyan-500">
    <img class="w-20 h-12 md:w-24 md:max-h-full" src="{{ asset('images/r6Logo.png') }}" alt="logo">

    {{-- Título centrado --}}
    <h1 class="absolute left-1/2 transform -translate-x-1/2 text-white text-4xl font-bold tracking-wide md:static md:translate-x-0 md:flex-grow md:text-center">
        RAINBOW SIX SIEGE
    </h1>

    {{-- Laptop (Desktop) --}}
    <div class="hidden md:flex flex-row space-x-6 items-center">
        @auth
            <div class="flex items-center space-x-3 bg-gray-800 p-2 rounded-lg shadow-lg border border-cyan-500">
                <span class="text-lg font-semibold text-cyan-300 bg-gray-700 px-3 py-1 rounded-md shadow-inner">
                    {{ auth()->user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 text-white bg-red-600 hover:bg-red-500 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">
                        {{ __('messages.logout') }}
                    </button>
                </form>
            </div>
        @endauth

        @guest
            <a class="px-4 py-2 text-white bg-green-600 hover:bg-green-500 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300" href="{{ route('login') }}">
                {{ __('messages.login') }}
            </a>
            <a class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-500 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300" href="{{ route('register') }}">
                {{ __('messages.register') }}
            </a>
        @endguest
    </div>

    {{-- Mobile --}}
    <div class="block md:hidden">
        <input type="checkbox" id="menu-toggle" class="peer hidden">
        <label class="text-3xl hover:cursor-pointer text-white" for="menu-toggle">
            &#9778;
        </label>

        <div class="absolute hidden peer-checked:block bg-gray-800 p-4 rounded-lg shadow-lg flex flex-col space-y-3 right-5 top-16 border border-cyan-500">
            @auth
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 rounded-full border-2 border-cyan-400" src="https://i.pravatar.cc/50" alt="Avatar">
                    <span class="text-lg font-semibold text-cyan-300 bg-gray-700 px-3 py-1 rounded-md shadow-inner">
                        {{ auth()->user()->name }}
                    </span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full px-4 py-2 text-white bg-red-600 hover:bg-red-500 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">
                        {{ __('messages.logout') }}
                    </button>
                </form>
            @endauth

            @guest
                <a class="w-full px-4 py-2 text-white bg-green-600 hover:bg-green-500 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300" href="{{ route('login') }}">
                    {{ __('messages.login') }}
                </a>
                <a class="w-full px-4 py-2 text-white bg-blue-600 hover:bg-blue-500 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300" href="{{ route('register') }}">
                    {{ __('messages.register') }}
                </a>
            @endguest
        </div>
    </div>

    {{-- Selector de idioma --}}
    <div class="flex items-center space-x-3">
        <form action="{{ route('language.switch', ['lang' => 'es']) }}" method="POST">
            @csrf
            <button type="submit" class="text-white hover:text-gray-300">{{ __('messages.spanish') }}</button>
        </form>
        <form action="{{ route('language.switch', ['lang' => 'en']) }}" method="POST">
            @csrf
            <button type="submit" class="text-white hover:text-gray-300">{{ __('messages.english') }}</button>
        </form>
        <form action="{{ route('language.switch', ['lang' => 'fr']) }}" method="POST">
            @csrf
            <button type="submit" class="text-white hover:text-gray-300">{{ __('messages.français') }}</button>
        </form>
    </div>

    @if (session('mensaje'))
        <div style="background-color: green; color: white; padding: 10px; margin-bottom: 10px; text-align: center;">
            {{ session('mensaje') }}
        </div>
    @endif

</header>
