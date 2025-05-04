<?php

namespace App\Http\Controllers;

use App\Models\EjercicioRutina;
use Illuminate\Http\Request;

class EjercicioRutinaController extends Controller
{
    public function index()
    {
        return EjercicioRutina::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia_rutina_id' => 'required|exists:dia_rutinas,id',
            'ejercicio_id' => 'required|exists:ejercicios,id',
            'series' => 'required|integer|min:1',
            'repeticiones' => 'required|integer|min:1',
            'peso' => 'required|numeric|min:0',
            'descanso_segundos' => 'required|integer|min:0',
            'orden' => 'required|integer|min:1'
        ]);

        return EjercicioRutina::create($request->all());
    }

    public function show($id)
    {
        return EjercicioRutina::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ejercicioRutina = EjercicioRutina::findOrFail($id);
        
        $request->validate([
            'dia_rutina_id' => 'exists:dia_rutinas,id',
            'ejercicio_id' => 'exists:ejercicios,id',
            'series' => 'integer|min:1',
            'repeticiones' => 'integer|min:1',
            'peso' => 'numeric|min:0',
            'descanso_segundos' => 'integer|min:0',
            'orden' => 'integer|min:1'
        ]);

        $ejercicioRutina->update($request->all());
        return $ejercicioRutina;
    }

    public function destroy($id)
    {
        $ejercicioRutina = EjercicioRutina::findOrFail($id);
        $ejercicioRutina->delete();
        return response()->json(null, 204);
    }

    public function getByDiaRutina($dia_rutina_id)
    {
        return EjercicioRutina::where('dia_rutina_id', $dia_rutina_id)
            ->orderBy('orden')
            ->get();
    }
}
