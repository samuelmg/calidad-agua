<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Reporte</title>
</head>
<body>
    <h1>Reporte #{{ $reporte->id }}</h1>

    <p><strong>Usuario:</strong> {{ $reporte->user->name }} ({{ $reporte->user->email }})</p>
    <p><strong>Ubicación:</strong> {{ $reporte->ubicacion }}</p>
    <p><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
    <p><strong>Fecha de inicio:</strong> {{ $reporte->fecha_inicio }}</p>
    <p><strong>Folio:</strong> {{ $reporte->folio }}</p>
    <p><strong>Fecha de creación:</strong> {{ $reporte->created_at }}</p>

    <a href="{{ route('reporte.edit', $reporte) }}">Editar reporte</a>

    <form action="{{ route('reporte.destroy', $reporte) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar reporte</button>
    </form>

    <a href="{{ route('reporte.index') }}">Regresar al listado</a>
</body>
</html>
