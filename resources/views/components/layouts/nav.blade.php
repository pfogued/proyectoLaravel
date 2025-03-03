<!-- resources/views/components/layouts/nav.blade.php -->
<nav class="bg-gray-800 text-white p-4">
    <ul>
        <li><a href="{{ route('personajes.index') }}" class="block py-2 px-4 hover:bg-gray-600 rounded">Personajes</a></li>
        <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-600 rounded">Dashboard</a></li>
        <li><a href="{{ route('logout') }}" class="block py-2 px-4 hover:bg-gray-600 rounded">Cerrar sesión</a></li>
    </ul>
</nav>
