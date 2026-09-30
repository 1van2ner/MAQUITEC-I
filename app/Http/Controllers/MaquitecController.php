<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Banner; // <-- 1. Agrega esto arriba

class MaquitecController extends Controller
{
    public function index()
    {
        // Obtenemos las categorías con el conteo de sus productos
        $categorias = Categoria::withCount('productos')->get();

        // Obtenemos hasta 4 productos marcados como destacados
        $productosDestacados = Producto::where('destacado', 1)->take(4)->get();

        // 2. Obtenemos los banners activos de la base de datos
        $banners = Banner::where('activo', true)->get();

        // Retornamos la vista 'maquitec' enviándole todas las variables (incluyendo '$banners')
        return view('maquitec', compact('categorias', 'productosDestacados', 'banners'));
    }
}