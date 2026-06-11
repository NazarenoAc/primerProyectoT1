<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Smartphones', 'descripcion' => 'Celulares y accesorios moviles'],
            ['nombre' => 'Computadoras', 'descripcion' => 'Notebooks, laptops y equipos de trabajo'],
            ['nombre' => 'Audio', 'descripcion' => 'Auriculares, sonido y perifericos'],
            ['nombre' => 'TV y Monitores', 'descripcion' => 'Pantallas, monitores y televisores'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::updateOrCreate(
                ['nombre' => $categoria['nombre']],
                [
                    'descripcion' => $categoria['descripcion'],
                    'activa' => true,
                ]
            );
        }
    }
}
