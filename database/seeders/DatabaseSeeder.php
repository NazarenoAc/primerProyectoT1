<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. PRIMERO llamamos a RolesSeeder para que cree los roles 'admin' (ID 1) y 'cliente' (ID 2)
        $this->call([ RolesSeeder::class ]);

        // 2. SEGUNDO creamos tu usuario administrador, ahora que el rol ID 1 YA EXISTE
        Usuario::create([
            'nombre' => 'Nicolás Benítez', 
            'email' => 'nicolasbenitez@gmail.com',
            'password' => '123456', // Se hashea solo gracias al cast de tu modelo Usuario
            'rol_id' => 1, 
        ]);
    }
}