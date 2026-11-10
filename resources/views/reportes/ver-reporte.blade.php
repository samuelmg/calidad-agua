<x-mi-layout>
    <x-titulo-pagina>Reporte #{{ $reporte->id }}</x-titulo-pagina>

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
</x-mi-layout>
