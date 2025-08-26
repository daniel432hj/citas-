@extends('layouts.app')

@section('title', 'Detalles del Paciente')

@section('content')
    <div class="container">
        <h1>Detalles del Paciente</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $paciente->nombre }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $paciente->email }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
                <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
            </div>
        </div>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
    </div>
@endsection