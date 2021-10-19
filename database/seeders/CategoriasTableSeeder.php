<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre_categoria' => 'G',
            'descripcion_categoria' => 'Apto para todo el publico' 
        ]);
        Categoria::create([
            'nombre_categoria' => 'PG',
            'descripcion_categoria' => 'Se recomienda supervision por un adulto' 
        ]);
        Categoria::create([
            'nombre_categoria' => 'PG12',
            'descripcion_categoria' => 'Requerida supervision por un adulto en jovenes menores de 12'
        ]);
        Categoria::create([
            'nombre_categoria' => 'R12',
            'descripcion_categoria' => 'Restringida a mayores de 12' 
        ]);
        Categoria::create([
            'nombre_categoria' => 'R18',
            'descripcion_categoria' => 'Restringida a mayores de 18' 
        ]);
    }
}
