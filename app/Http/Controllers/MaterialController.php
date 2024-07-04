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
}
