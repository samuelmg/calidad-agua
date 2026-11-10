<x-mi-layout>
    <x-titulo-pagina>
        Editar reporte #{{ $reporte->id }}
    </x-titulo-pagina>

    <x-errores-formulario />

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
</x-mi-layout>
