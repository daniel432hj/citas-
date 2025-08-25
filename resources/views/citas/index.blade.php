@extends('layouts.app')

@section('title', 'Listado de Citas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de Citas</h1>
        <a href="{{ route('citas.create') }}" class="btn btn-primary">Crear nueva cita</a>
    </div>

    @if ($citas->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay citas registradas.
        </div>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->titulo }}</td>
                        <td>{{ $cita->fecha_hora }}</td>
                        <td>
                            <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline;">
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