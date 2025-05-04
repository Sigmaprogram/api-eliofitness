<?php

namespace App\Http\Controllers;

use App\Models\SetCompletado;
use Illuminate\Http\Request;

class SetCompletadoController extends Controller
{
    public function index()
    {
        return SetCompletado::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'registro_entrenamiento_id' => 'required|exists:registros_entrenamiento,id',
            'ejercicio_rutina_id' => 'required|exists:ejercicio_rutinas,id',
            'repeticiones_completadas' => 'required|integer|min:0',
            'peso_usado' => 'required|numeric|min:0',
            'completado' => 'required|boolean'
        ]);

        return SetCompletado::create($request->all());
    }

    public function show($id)
    {
        return SetCompletado::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $setCompletado = SetCompletado::findOrFail($id);
        
        $request->validate([
            'registro_entrenamiento_id' => 'exists:registros_entrenamiento,id',
            'ejercicio_rutina_id' => 'exists:ejercicio_rutinas,id',
            'repeticiones_completadas' => 'integer|min:0',
            'peso_usado' => 'numeric|min:0',
            'completado' => 'boolean'
        ]);

        $setCompletado->update($request->all());
        return $setCompletado;
    }

    public function destroy($id)
    {
        $setCompletado = SetCompletado::findOrFail($id);
        $setCompletado->delete();
        return response()->json(null, 204);
    }

    public function getByRegistroEntrenamiento($registro_id)
    {
        return SetCompletado::where('registro_entrenamiento_id', $registro_id)->get();
    }
}
