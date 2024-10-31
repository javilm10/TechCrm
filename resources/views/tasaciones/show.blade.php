@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Tasación</h1>
    <table class="table">
        <tr>
            <th>Nombre del Cliente</th>
            <td>{{ $tasacion->cliente_nombre }}</td>
        </tr>
        <tr>
            <th>Contacto del Cliente</th>
            <td>{{ $tasacion->cliente_contacto }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $tasacion->direccion }}</td>
        </tr>
        <tr>
            <th>Precio</th>
            <td>{{ $tasacion->precio }}</td>
        </tr>
        <tr>
            <th>Comentarios</th>
            <td>{{ $tasacion->comentarios }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $tasacion->estado }}</td>
        </tr>
        <tr>
            <th>Historial</th>
            <td>
                <ul>
                    @foreach ($tasacion->historial as $historial)
                        <li>{{ $historial->estado }} - {{ $historial->created_at }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    <a href="{{ route('tasaciones.edit', $tasacion->id) }}" class="btn btn-warning">Editar Tasación</a>
    <form action="{{ route('tasaciones.destroy', $tasacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta tasación?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>

    <a href="{{ route('tasaciones.index') }}" class="btn btn-secondary">Volver a la Lista</a>
</div>
@endsection
