{{-- resources/views/tasaciones/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Solicitar Tasación</h2>
        
        <form action="{{ route('tasaciones.store') }}" method="POST">
            @csrf <!-- Token CSRF para proteger contra ataques de falsificación de solicitudes -->

            <div class="form-group">
                <label for="cliente_nombre">Nombre del Cliente</label>
                <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cliente_contacto">Contacto del Cliente</label>
                <input type="text" name="cliente_contacto" id="cliente_contacto" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección de la Propiedad</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio de la Vivienda</label>
                <input type="number" name="precio" id="precio" class="form-control">
            </div>

            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea name="comentarios" id="comentarios" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
        </form>
    </div>
@endsection
