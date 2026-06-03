<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categoriaSeleccionada = $request->query('categoria');
        $ordenSeleccionado = $request->query('orden');

        $categorias = Categoria::where('activa', true)
            ->orderBy('nombre')
            ->get();

        $productos = Producto::with('categoria')
            ->where('activo', true)
            ->when($categoriaSeleccionada, function ($query) use ($categoriaSeleccionada) {
                $query->whereHas('categoria', fn ($categoria) => $categoria->where('nombre', $categoriaSeleccionada));
            })
            ->when($ordenSeleccionado === 'precio_asc', fn ($query) => $query->orderBy('precio'))
            ->when($ordenSeleccionado === 'precio_desc', fn ($query) => $query->orderByDesc('precio'))
            ->when(! in_array($ordenSeleccionado, ['precio_asc', 'precio_desc'], true), fn ($query) => $query->orderBy('nombre'))
            ->get();

        return view('productos', compact('categorias', 'productos', 'categoriaSeleccionada', 'ordenSeleccionado'));
    }
}
