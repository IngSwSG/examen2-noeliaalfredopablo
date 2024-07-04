<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Valida que el endpoint encargado de insertar nuevos registros de materiales,
     * para el escenario en el cual el material no existe, lo hace correctamente.
     *
     * @return void
     */
    public function testDadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        // Crear una categoría para asociar al material en la base de datos de prueba
        $categoria = Categoria::create([
            'nombre' => 'Categoría de Prueba'
        ]);

        // Verificar que la categoría fue creada correctamente
        $this->assertNotNull($categoria, 'La categoría no fue creada correctamente.');

        // Datos del material a insertar
        $data = [
            'codigo' => 'M001',
            'unidadMedida' => 'Unidad',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Bodega A',
            'idCategoria' => $categoria->id,
        ];

        // Realizar la solicitud POST para insertar el material
        $response = $this->postJson('/api/materiales', $data);

        // Verificar que la respuesta sea exitosa y el material se haya creado
        $response->assertStatus(201)
                 ->assertJson([
                     'codigo' => 'M001',
                     'unidadMedida' => 'Unidad',
                     'descripcion' => 'Material de prueba',
                     'ubicacion' => 'Bodega A',
                     'idCategoria' => $categoria->id,
                 ]);

        // Verificar que el material esté en la base de datos
        $this->assertDatabaseHas('materials', $data);
    }
}

