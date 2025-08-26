<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    /**
     * Muestra un listado de todos los pacientes.
     */
    public function index()
    {
        $pacientes = Paciente::all(); // Obtiene todos los pacientes de la base de datos
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Muestra el formulario para crear un nuevo paciente.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Almacena un paciente recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de datos (opcional pero recomendado)
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:pacientes,email',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Muestra los detalles de un paciente específico.
     */
    public function show(string $id)
    {
        $paciente = Paciente::findOrFail($id); // Busca el paciente por ID o lanza un error 404 si no se encuentra
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Muestra el formulario para editar un paciente existente.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Actualiza un paciente en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // Validación de datos (opcional pero recomendado)
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:pacientes,email,' . $id,
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Elimina un paciente de la base de datos.
     */
    public function destroy(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}