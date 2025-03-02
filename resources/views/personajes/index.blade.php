<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personajes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        function confirmarEliminacion(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente
            if (confirm('¿Estás seguro de que quieres eliminar este personaje?')) {
                event.target.closest('form').submit(); // Si confirma, envía el formulario
            }
        }
    </script>
</head>
<body>

<h1>Lista de Personajes</h1>
<a href="{{ route('personajes.create') }}" class="btn btn-primary">Crear Personaje</a>

@foreach ($personajes as $personaje)
    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
        <h2>{{ $personaje->nombre }} ({{ ucfirst($personaje->tipo) }})</h2>
        <p><strong>Unidad Especial:</strong> {{ $personaje->unidad_especial }}</p>
        <p><strong>Vida:</strong> {{ $personaje->vida }} | <strong>Velocidad:</strong> {{ $personaje->velocidad }}</p>

        <h3>Armas:</h3>
        <ul>
            @foreach ($personaje->armas as $arma)
                <li>{{ $arma->nombre }} - {{ $arma->tipo }} (Daño: {{ $arma->daño }})</li>
            @endforeach
        </ul>

        <a href="{{ route('personajes.edit', $personaje) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" style="display: inline;">
            @csrf @method('DELETE')
            <button class="btn btn-danger" onclick="confirmarEliminacion(event)">Eliminar</button>
        </form>
    </div>
@endforeach

</body>
</html>
