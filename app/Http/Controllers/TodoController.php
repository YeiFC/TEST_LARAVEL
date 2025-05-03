<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    // Obtener todos los TODO
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    // Crear un nuevo TODO
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $todo = Todo::create([
            'title' => $request->title,
            'completed' => false
        ]);

        return response()->json($todo, 201);
    }

    // Eliminar un TODO
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(null, 204);
    }
}
