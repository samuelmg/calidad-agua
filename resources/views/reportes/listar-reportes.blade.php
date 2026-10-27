<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Reportes</title>
</head>
<body>
    <h1>Mis Reportes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Ubicación</th>
                <th>Folio</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->user_id }}
                    <td>{{ $reporte->ubicacion }}</td>
                    <td>{{ $reporte->folio }}</td>
                    <td>{{ $reporte->created_at }}</td>
                    <td> -- Acciones: editar / eliminar? -- </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>