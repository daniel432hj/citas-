@extends('layouts.app')

@section('title', 'Detalle de cita')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Detalle de la Cita</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $cita->titulo }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $cita->descripcion }}</p>
            <p class="card-text"><small class="text-muted"><strong>Fecha y Hora:</strong> {{ $cita->fecha_hora }}</small></p>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning me-2">Editar</a>
            <a href="{{ route('citas.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>
@endsection