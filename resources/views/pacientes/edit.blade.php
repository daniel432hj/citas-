@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('content')
    <div class="container">
        <h1>Editar Paciente</h1>
        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $paciente->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $paciente->email }}">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $paciente->telefono }}">
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection