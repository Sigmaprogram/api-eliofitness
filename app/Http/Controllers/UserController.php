<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios|max:150',
            'password_hash' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string|max:20',
            'estado' => 'nullable|string|in:activo,inactivo,suspendido',
            'foto_perfil' => 'nullable|string|max:255'
        ]);

        $usuario = User::create($validatedData);
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = user::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = user::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'apellido' => 'string|max:100',
            'email' => 'email|unique:usuarios,email,'.$id.'|max:150',
            'password_hash' => 'string|max:255',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string|max:20',
            'estado' => 'nullable|string|in:activo,inactivo,suspendido',
            'foto_perfil' => 'nullable|string|max:255'
        ]);

        $usuario->update($validatedData);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
