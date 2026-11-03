<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crea tu reporte de agua</h1>
    <form action="{{ route('reporte.store') }}" method="POST">
        @csrf
        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion">
        <br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        <br>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
        <br>
        <button type="submit">Crear reporte</button>
    </form>
</body>
</html>
