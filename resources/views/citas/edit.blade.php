@extends('layouts.app')

@section('title', 'Editar cita')

@section('content')
    <h1>Editar Cita</h1>
    <form action="{{ route('citas.update', $cita->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $cita->titulo }}" required>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $cita->descripcion }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="fecha_hora" class="form-label">Fecha y Hora:</label>
            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('Y-m-d\TH:i') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection