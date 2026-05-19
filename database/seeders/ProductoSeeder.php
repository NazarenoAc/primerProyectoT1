<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'MacBook Air',
                'descripcion' => 'Laptop ultraligera y potente de Apple con procesador M3',
                'precio' => 1299.99,
                'stock' => 15,
                'activo' => true,
                'url_imagen' => 'https://via.placeholder.com/300?text=MacBook+Air',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'MacBook Pro',
                'descripcion' => 'Laptop profesional de Apple con procesador M3 Max',
                'precio' => 1999.99,
                'stock' => 10,
                'activo' => true,
                'url_imagen' => 'https://via.placeholder.com/300?text=MacBook+Pro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'iPhone 17',
                'descripcion' => 'Teléfono inteligente de Apple con tecnología de última generación',
                'precio' => 899.99,
                'stock' => 25,
                'activo' => true,
                'url_imagen' => 'https://via.placeholder.com/300?text=iPhone+17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
