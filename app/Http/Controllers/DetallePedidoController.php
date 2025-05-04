<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    public function index()
    {
        return DetallePedido::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        return DetallePedido::create($request->all());
    }

    public function show($id)
    {
        return DetallePedido::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $detallePedido = DetallePedido::findOrFail($id);
        
        $request->validate([
            'pedido_id' => 'exists:pedidos,id',
            'producto_id' => 'exists:productos,id',
            'cantidad' => 'integer|min:1',
            'precio_unitario' => 'numeric|min:0',
            'subtotal' => 'numeric|min:0'
        ]);

        $detallePedido->update($request->all());
        return $detallePedido;
    }

    public function destroy($id)
    {
        $detallePedido = DetallePedido::findOrFail($id);
        $detallePedido->delete();
        return response()->json(null, 204);
    }

    public function getByPedido($pedido_id)
    {
        return DetallePedido::where('pedido_id', $pedido_id)->get();
    }
}
