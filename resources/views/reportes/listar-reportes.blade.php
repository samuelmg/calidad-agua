<x-mi-layout tituloNavegador="Listado de reportes"> 
    <x-titulo-pagina>
        Listado de reportes
    </x-titulo-pagina>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Ubicación</th>
                <th>Descripción</th>
                <th>Folio</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>
                        {{ $reporte->user->name }} <br>
                        {{ $reporte->user->email }}
                    </td>
                    <td>{{ $reporte->ubicacion }}</td>
                    <td>{{ $reporte->descripcion }}</td>
                    <td>{{ $reporte->folio }}</td>
                    <td>{{ $reporte->created_at }}</td>
                    <td>
                        @can('update', $reporte)
                            <a href="{{ route('reporte.edit', $reporte) }}">Editar</a>
                        @endcan    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-mi-layout>
