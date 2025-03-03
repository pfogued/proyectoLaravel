{{-- Header para móvil --}}
<header class="relative md:h-20 bg-gray-900 shadow-lg flex flex-col md:flex-row justify-between px-5 py-3 items-center border-b border-cyan-500">
    <img class="w-20 h-12 md:w-24 md:max-h-full" src="{{ asset('images/r6Logo.png') }}" alt="logo">

    {{-- Título centrado --}}
    <h1 class="absolute left-1/2 transform -translate-x-1/2 text-white text-4xl font-bold tracking-wide md:static md:translate-x-0 md:flex-grow md:text-center">
        RAINBOW SIX SIEGE
    </h1>

    {{-- Laptop (Desktop) --}}
    <div class="hidden md:flex flex-row space-x-4 items-center">
        @auth
            <span class="user-highlight">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn-3d bg-red-600 hover:bg-red-500">Cerrar sesión</button>
            </form>
        @endauth

        @guest
            <a class="btn-3d bg-green-600 hover:bg-green-500" href="{{ route('login') }}">Iniciar sesión</a>
            <a class="btn-3d bg-blue-600 hover:bg-blue-500" href="{{ route('register') }}">Registrarse</a>
        @endguest
    </div>

    {{-- Mobile --}}
    <div class="block md:hidden">
        <input type="checkbox" id="menu-toggle" class="peer hidden">
        <label class="text-3xl hover:cursor-pointer text-white" for="menu-toggle">
            &#9778;
        </label>

        <div class="absolute hidden peer-checked:block bg-gray-800 p-4 rounded-lg shadow-lg flex flex-col space-y-2 right-5 top-16 border border-cyan-500">
            @auth
                <span class="user-highlight">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-3d bg-red-600 hover:bg-red-500 w-full">Cerrar sesión</button>
                </form>
            @endauth

            @guest
                <a class="btn-3d bg-green-600 hover:bg-green-500 w-full" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="btn-3d bg-blue-600 hover:bg-blue-500 w-full" href="{{ route('register') }}">Registrarse</a>
            @endguest
        </div>
    </div>
</header>
