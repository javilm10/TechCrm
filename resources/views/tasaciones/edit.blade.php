<form action="{{ route('tasaciones.update', $tasacion->id) }}" method="POST">
    
    @csrf
    @method('PUT') <!-- Esto es importante para indicar que es una actualización -->
    
    <!-- Campos del formulario -->
    <div class="form-group">
        <label for="cliente_nombre">Nombre del Cliente</label>
        <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" value="{{ $tasacion->cliente_nombre }}" required>
    </div>
    
    <div class="form-group">
        <label for="cliente_contacto">Contacto del Cliente</label>
        <input type="text" name="cliente_contacto" id="cliente_contacto" class="form-control" value="{{ $tasacion->cliente_contacto }}" required>
    </div>

    <div class="form-group">
        <label for="direccion">Dirección de la Propiedad</label>
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $tasacion->direccion }}" required>
    </div>

    <div class="form-group">
        <label for="precio">Precio de la Vivienda</label>
        <input type="number" name="precio" id="precio" class="form-control" value="{{ $tasacion->precio }}">
    </div>

    <div class="form-group">
        <label for="comentarios">Comentarios</label>
        <textarea name="comentarios" id="comentarios" class="form-control">{{ $tasacion->comentarios }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Tasación</button>
</form>
