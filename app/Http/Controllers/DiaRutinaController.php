<?php

namespace App\Http\Controllers;

use App\Models\DiaRutina;
use Illuminate\Http\Request;

class DiaRutinaController extends Controller
{
    public function index()
    {
        return DiaRutina::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'rutina_id' => 'required|exists:rutinas,id',
            'dia_semana' => 'required|string',
            'nombre' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        return DiaRutina::create($request->all());
    }

    public function show($id)
    {
        return DiaRutina::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $diaRutina = DiaRutina::findOrFail($id);
        
        $request->validate([
            'rutina_id' => 'exists:rutinas,id',
            'dia_semana' => 'string',
            'nombre' => 'string',
            'descripcion' => 'string'
        ]);

        $diaRutina->update($request->all());
        return $diaRutina;
    }

    public function destroy($id)
    {
        $diaRutina = DiaRutina::findOrFail($id);
        $diaRutina->delete();
        return response()->json(null, 204);
    }

    public function getByRutina($rutina_id)
    {
        return DiaRutina::where('rutina_id', $rutina_id)->get();
    }
}
