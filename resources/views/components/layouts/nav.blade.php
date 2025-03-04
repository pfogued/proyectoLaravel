<!-- resources/views/components/layouts/nav.blade.php -->
<nav class="bg-gray-900 text-white py-4 px-6 shadow-md border-b border-cyan-500">
    <ul class="flex justify-center space-x-8 text-lg font-semibold">
        <li><a href="https://www.ubisoft.com/es-es/game/rainbow-six/siege/game-info/maps" class="nav-link" target="_blank">Mapas</a></li>
        <li><a href="https://www.ubisoft.com/es-es/esports/rainbow-six/siege" class="nav-link" target="_blank">Esports</a></li>
        <li><a href="https://www.ubisoft.com/es-es/game/rainbow-six/siege/marketplace?route=home" class="nav-link" target="_blank">MarketPlace</a></li>



    </ul>
</nav>

<!-- Estilos personalizados -->
<style>
    .nav-link {
        color: #FFD700;
        transition: all 0.3s ease-in-out;
        padding: 10px 15px;
        border-radius: 8px;
        display: inline-block;
    }

    .nav-link:hover {
        background-color: rgba(0, 255, 255, 0.2);
        text-shadow: 0 0 10px cyan;
    }

    /* Botón de Logout para que parezca enlace */
    .logout-btn {
        background: none;
        border: none;
        color: #FFD700;
        cursor: pointer;
        font-size: 18px;
        transition: all 0.3s ease-in-out;
        padding: 10px 15px;
        border-radius: 8px;
        display: inline-block;
    }

    .logout-btn:hover {
        background-color: rgba(255, 0, 0, 0.3);
        text-shadow: 0 0 10px red;
    }
</style>
