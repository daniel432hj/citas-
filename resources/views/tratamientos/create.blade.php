@extends('layouts.app')

@section('title', 'Crear nuevo tratamiento')

@section('content')
    <h1>Crear nuevo tratamiento</h1>
    <form action="{{ route('tratamientos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required autocomplete="off"></textarea>
        </div>
        <div class="mb-3">
            <label for="costo" class="form-label">Costo:</label>
            <input type="number" step="0.01" id="costo" name="costo" class="form-control" required autocomplete="off">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection