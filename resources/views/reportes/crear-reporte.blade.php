<x-mi-layout tituloNavegador="Crear reporte">
    <x-titulo-pagina>Crea tu reporte de agua</x-titulo-pagina>

    <x-errores-formulario />

    <form action="{{ route('reporte.store') }}" method="POST">
        @csrf
        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}">
        @error('ubicacion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input
            type="date"
            name="fecha_inicio"
            id="fecha_inicio"
            value="{{ old('fecha_inicio') }}"
        >
        @error('fecha_inicio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Crear reporte</button>
    </form>
</x-mi-layout>
