<?php

namespace App\Http\Controllers;

use App\Models\DetalleComida;
use Illuminate\Http\Request;

class DetalleComidaController extends Controller
{
    public function index()
    {
        return DetalleComida::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'comida_id' => 'required|exists:comidas,id',
            'alimento_id' => 'required|exists:alimentos,id',
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required|string'
        ]);

        return DetalleComida::create($request->all());
    }

    public function show($id)
    {
        return DetalleComida::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $detalleComida = DetalleComida::findOrFail($id);
        
        $request->validate([
            'comida_id' => 'exists:comidas,id',
            'alimento_id' => 'exists:alimentos,id',
            'cantidad' => 'numeric',
            'unidad_medida' => 'string'
        ]);

        $detalleComida->update($request->all());
        return $detalleComida;
    }

    public function destroy($id)
    {
        $detalleComida = DetalleComida::findOrFail($id);
        $detalleComida->delete();
        return response()->json(null, 204);
    }

    public function getByComida($comida_id)
    {
        return DetalleComida::where('comida_id', $comida_id)->get();
    }
}
