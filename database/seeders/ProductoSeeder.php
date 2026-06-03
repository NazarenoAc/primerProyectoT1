<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'categoria' => 'Computadoras',
                'nombre' => 'MacBook Air',
                'descripcion' => 'Laptop ultraligera y potente de Apple con procesador M3.',
                'precio' => 1299.99,
                'stock' => 15,
                'url_imagen' => 'images/productos.png',
            ],
            [
                'categoria' => 'Computadoras',
                'nombre' => 'MacBook Pro',
                'descripcion' => 'Laptop profesional de Apple con alto rendimiento para trabajo exigente.',
                'precio' => 1999.99,
                'stock' => 10,
                'url_imagen' => 'images/productos.png',
            ],
            [
                'categoria' => 'Smartphones',
                'nombre' => 'iPhone 17',
                'descripcion' => 'Telefono inteligente con camara avanzada, gran autonomia y pantalla de alta calidad.',
                'precio' => 899.99,
                'stock' => 25,
                'url_imagen' => 'images/novedades.png',
            ],
            [
                'categoria' => 'Audio',
                'nombre' => 'Auriculares Wireless JBL Quantum',
                'descripcion' => 'Audio envolvente, conexion Bluetooth y autonomia extendida.',
                'precio' => 149.99,
                'stock' => 18,
                'url_imagen' => 'images/ofertas.png',
            ],
            [
                'categoria' => 'Wearables',
                'nombre' => 'Smartwatch Pro',
                'descripcion' => 'Monitor de salud, GPS integrado y notificaciones inteligentes.',
                'precio' => 199.99,
                'stock' => 8,
                'url_imagen' => 'images/conocenos.png',
            ],
            [
                'categoria' => 'TV y Monitores',
                'nombre' => 'Monitor BENQ 240HZ ZOWIE',
                'descripcion' => 'Monitor gamer de alta tasa de refresco, ideal para competicion.',
                'precio' => 349.99,
                'stock' => 6,
                'url_imagen' => 'images/bannerInicio.png',
            ],
        ];

        foreach ($productos as $producto) {
            $categoria = Categoria::where('nombre', $producto['categoria'])->first();

            Producto::updateOrCreate(
                ['nombre' => $producto['nombre']],
                [
                    'categoria_id' => $categoria?->id,
                    'descripcion' => $producto['descripcion'],
                    'precio' => $producto['precio'],
                    'stock' => $producto['stock'],
                    'activo' => true,
                    'url_imagen' => $producto['url_imagen'],
                ]
            );
        }
    }
}
