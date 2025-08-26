@extends('layouts.app')

@section('title', 'Editar tratamiento')

@section('content')
    <h1>Editar Tratamiento</h1>
    <form action="{{ route('tratamientos.update', $tratamiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $tratamiento->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $tratamiento->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="costo" class="form-label">Costo:</label>
            <input type="number" step="0.01" id="costo" name="costo" class="form-control" value="{{ $tratamiento->costo }}" required>
        </div>
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select id="paciente_id" name="paciente_id" class="form-control" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $tratamiento->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cita_id" class="form-label">Cita:</label>
            <select id="cita_id" name="cita_id" class="form-control" required>
                @foreach($citas as $cita)
                    <option value="{{ $cita->id }}" {{ $cita->id == $tratamiento->cita_id ? 'selected' : '' }}>
                        {{ $cita->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection