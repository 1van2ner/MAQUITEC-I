<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class MaquitecController extends Controller
{
    public function index()
    {
        // Obtenemos las categorías con el conteo de sus productos
        $categorias = Categoria::withCount('productos')->get();
        
        // Obtenemos hasta 4 productos marcados como destacados
        $productosDestacados = Producto::where('destacado', 1)->take(4)->get();

        // Retornamos la vista 'maquitec' enviándole ambas variables
        return view('maquitec', compact('categorias', 'productosDestacados'));
    }
}