<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Reporte</title>
</head>
<body>
    <h1>Editar reporte #{{ $reporte->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reporte.update', $reporte) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') ?? $reporte->ubicacion }}">
        <br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10">{{ old('ubicacion') ?? $reporte->descripcion }}</textarea>
        <br>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('ubicacion') ?? $reporte->fecha_inicio }}">
        <br>
        <button type="submit">Actualizar reporte</button>
    </form>

    <a href="{{ route('reporte.show', $reporte) }}">Cancelar</a>
</body>
</html>
