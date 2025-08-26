@extends('layouts.app')

@section('title', 'Listado de Pacientes')

@section('content')
    <div class="container">
        <h1>Listado de Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Crear nuevo paciente</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este paciente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection