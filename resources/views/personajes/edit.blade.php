<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personaje</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<h1>Editar Personaje</h1>
<a href="{{ route('personajes.index') }}">Volver a la Lista</a>

<!-- Mostrar errores -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('personajes.update', $personaje) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $personaje->nombre }}" required>

    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="atacante" {{ $personaje->tipo == 'atacante' ? 'selected' : '' }}>Atacante</option>
        <option value="defensor" {{ $personaje->tipo == 'defensor' ? 'selected' : '' }}>Defensor</option>
    </select>

    <label for="unidad_especial">Unidad Especial:</label>
    <input type="text" id="unidad_especial" name="unidad_especial" value="{{ $personaje->unidad_especial }}" required>

    <label for="vida">Vida:</label>
    <input type="number" id="vida" name="vida" value="{{ $personaje->vida }}" required>

    <label for="velocidad">Velocidad:</label>
    <input type="number" id="velocidad" name="velocidad" value="{{ $personaje->velocidad }}" required>

    <h2>Editar Armas</h2>

    @foreach ($personaje->armas as $index => $arma)
        <div class="arma">
            <input type="hidden" name="armas[{{ $index }}][id]" value="{{ $arma->id }}">

            <label for="armas[{{ $index }}][nombre]">Nombre:</label>
            <input type="text" name="armas[{{ $index }}][nombre]" value="{{ $arma->nombre }}" required>

            <label for="armas[{{ $index }}][tipo]">Tipo:</label>
            <input type="text" name="armas[{{ $index }}][tipo]" value="{{ $arma->tipo }}" required>

            <label for="armas[{{ $index }}][daño]">Daño:</label>
            <input type="number" name="armas[{{ $index }}][daño]" value="{{ $arma->daño }}" required>

            <label for="armas[{{ $index }}][cadencia]">Cadencia:</label>
            <input type="number" name="armas[{{ $index }}][cadencia]" value="{{ $arma->cadencia }}" required>

            <input type="hidden" name="personaje_id[{{$index}}][personaje_id]" value="{{$personaje->id}}">
        </div>
    @endforeach

    <button type="submit">Actualizar</button>
</form>

</body>
</html>
