<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personajes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            <button class="btn btn-danger">Eliminar</button>
        </form>
        @section('content')
            <div class="container">
                <h1>Lista de Personajes</h1>
                <a href="{{ route('personajes.create') }}" class="btn btn-primary">Nuevo Personaje</a>

                @foreach ($personajes as $personaje)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $personaje->nombre }} ({{ ucfirst($personaje->tipo) }})</h5>
                            <p><strong>Unidad Especial:</strong> {{ $personaje->unidad_especial }}</p>
                            <p><strong>Vida:</strong> {{ $personaje->vida }} | <strong>Velocidad:</strong> {{ $personaje->velocidad }}</p>
                            <a href="{{ route('personajes.edit', $personaje) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endsection

    </div>
@endforeach

</body>
</html>
