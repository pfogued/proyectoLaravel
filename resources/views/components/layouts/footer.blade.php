<!-- resources/views/components/layouts/footer.blade.php -->
<footer class="bg-gray-900 text-white py-6 border-t border-cyan-500 shadow-lg">
    <div class="container mx-auto text-center">
        <!-- Logo y Nombre -->
        <div class="flex justify-center items-center mb-4">
            <img src="{{ asset('images/r6Logo.png') }}" alt="{{ __('messages.logo_alt_text') }}" class="w-12 h-12 mr-3">
            <h2 class="text-2xl font-bold text-yellow-400">{{ __('messages.game_name') }}</h2>
        </div>

        <!-- Derechos -->
        <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} {{ __('messages.rights_reserved') }}</p>
    </div>
</footer>

<!-- Estilos personalizados -->
<style>
    .footer-link {
        font-size: 16px;
        font-weight: bold;
        color: #FFD700;
        text-transform: uppercase;
        transition: all 0.3s ease-in-out;
        position: relative;
    }

    .footer-link:hover {
        color: cyan;
        text-shadow: 0 0 10px cyan;
    }

    /* Línea animada debajo del enlace */
    .footer-link::after {
        content: "";
        position: absolute;
        width: 0;
        height: 3px;
        background: cyan;
        left: 50%;
        bottom: -5px;
        transition: all 0.3s ease-in-out;
        transform: translateX(-50%);
    }

    .footer-link:hover::after {
        width: 100%;
    }

    .social-icon img {
        transition: transform 0.3s ease-in-out, filter 0.3s;
    }

    .social-icon:hover img {
        transform: scale(1.2);
        filter: drop-shadow(0 0 5px cyan);
    }
</style>
