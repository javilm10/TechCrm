@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasaciones</h1>
    <a href="{{ route('tasaciones.create') }}" class="btn btn-primary">Solicitar Tasación</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Dirección</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasaciones as $tasacion)
                <tr>
                    <td>{{ $tasacion->cliente_nombre }}</td>
                    <td>{{ $tasacion->cliente_contacto }}</td>
                    <td>{{ $tasacion->direccion }}</td>
                    <td>{{ $tasacion->precio }}</td>
                    <td>{{ $tasacion->estado }}</td>
                    <td>
                        <a href="{{ route('tasaciones.edit', $tasacion->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('tasaciones.destroy', $tasacion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
