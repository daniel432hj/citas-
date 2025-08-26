@extends('layouts.app')

@section('title', 'Listado de Tratamientos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de Tratamientos</h1>
        <a href="{{ route('tratamientos.create') }}" class="btn btn-primary">Crear nuevo tratamiento</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($tratamientos->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay tratamientos registrados.
        </div>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tratamientos as $tratamiento)
                    <tr>
                        <td>{{ $tratamiento->nombre }}</td>
                        <td>${{ number_format($tratamiento->costo, 2) }}</td>
                        <td>
                            <a href="{{ route('tratamientos.show', $tratamiento->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('tratamientos.edit', $tratamiento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection