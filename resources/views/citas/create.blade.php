@extends('layouts.app')

@section('title', 'Crear nueva cita')

@section('content')
    <h1>Crear nueva cita</h1>
    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="fecha_hora" class="form-label">Fecha y Hora:</label>
            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection