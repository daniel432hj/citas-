<?php

// En app/Http/Controllers/CitaController.php

namespace App\Http\Controllers;

use App\Models\Cita; // Importamos el modelo Cita
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Muestra una lista de todas las citas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all(); // Obtiene todas las citas de la base de datos
        return view('citas.index', compact('citas'));
    }

    /**
     * Muestra el formulario para crear una nueva cita.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Almacena una nueva cita en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date',
        ]);
        
        // Crea una nueva cita con los datos validados
        Cita::create($request->all());
        
        // Redirige al usuario a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Muestra los detalles de una cita específica.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    /**
     * Muestra el formulario para editar una cita.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        return view('citas.edit', compact('cita'));
    }

    /**
     * Actualiza los datos de una cita en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        // Valida los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date',
        ]);

        // Actualiza la cita con los nuevos datos
        $cita->update($request->all());

        // Redirige al usuario a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Elimina una cita de la base de datos.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        // Elimina la cita
        $cita->delete();

        // Redirige al usuario a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}