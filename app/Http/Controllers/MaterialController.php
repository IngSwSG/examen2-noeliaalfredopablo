<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'codigo' => 'required|string|max:255',
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'idCategoria' => 'required|exists:categorias,id',
        ]);

        // Crear un nuevo material
        $material = Material::create([
            'codigo' => $request->codigo,
            'unidadMedida' => $request->unidadMedida,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'idCategoria' => $request->idCategoria,
        ]);

        return response()->json($material, 201);
    }
    
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'codigo' => 'sometimes|required|string|max:255',
            'unidadMedida' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string|max:255',
            'ubicacion' => 'sometimes|required|string|max:255',
            'idCategoria' => 'sometimes|required|exists:categorias,id',
        ]);

        // Buscar el material por ID y actualizarlo
        $material = Material::findOrFail($id);
        $material->update($request->all());

        return response()->json($material, 200);
    }

    public function index()
    {
        // Obtener todos los materiales con sus categorías
        $materiales = Material::with('categoria')->get();

        return response()->json($materiales, 200);
    }


}
