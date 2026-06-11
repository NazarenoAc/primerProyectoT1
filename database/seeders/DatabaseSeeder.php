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

        $admins = [
            [
                'email' => 'nicolasbenitez@gmail.com',
                'nombre' => 'Nicolas Benitez',
            ],
            [
                'email' => 'acevedonaza3@gmail.com',
                'nombre' => 'Nazareno Acevedo Acosta',
            ],
        ];

        foreach ($admins as $admin) {
            Usuario::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'nombre' => $admin['nombre'],
                    'password' => '123456',
                    'rol_id' => $rolAdmin->id,
                ]
            );
        }
    }
}
