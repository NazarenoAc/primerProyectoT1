<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class,
        ]);

        $rolAdmin = Rol::where('nombre', 'admin')->firstOrFail();

        Usuario::updateOrCreate(
            ['email' => 'nicolasbenitez@gmail.com'],
            [
                'nombre' => 'Nicolas Benitez',
                'password' => '123456',
                'rol_id' => $rolAdmin->id,
            ],
            ['email' => 'acevedonaza3@gmail.com'],
            [
                'nombre' => 'Nazareno Acevedo Acosta',
                'password' => '123456',
                'rol_id' => $rolAdmin->id,
            ]
        );
    }
}
