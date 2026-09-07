<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    // Listar productos en la vista pública con filtrado por categoría y barra lateral
    public function index(Request $request)
    {
        // Obtenemos todas las categorías con el conteo de sus productos para el sidebar
        $categorias = Categoria::withCount('productos')->get();
        
        // Total general de productos
        $totalProductos = Producto::count();

        // Creamos la consulta base para los productos
        $query = Producto::with('categoria');

        // Si el usuario hizo clic en una categoría del sidebar, filtramos
        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('categoria_id', $request->categoria);
            $categoriaActual = Categoria::find($request->categoria);
        } else {
            $categoriaActual = null;
        }

        $productos = $query->get();

        return view('productos', compact('categorias', 'productos', 'totalProductos', 'categoriaActual'));
    }

    // Listar productos en el panel de administración
    public function adminIndex()
    {
        $productos = Producto::with('categoria')->get();
        return view('admin.productos.index', compact('productos'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }

    // Guardar el nuevo producto en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'destacado' => 'nullable|boolean',
        ]);

        $rutaImagen = 'img/img_maquitec1.jpg'; // Imagen por defecto

        // Subir la imagen a public/img/productos
        if ($request->hasFile('imagen')) {
            $imagenFile = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagenFile->getClientOriginalName();
            $imagenFile->move(public_path('img/productos'), $nombreImagen);
            $rutaImagen = 'img/productos/' . $nombreImagen;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'codigo' => $request->codigo ?? 'MAQ-' . rand(1000, 9999),
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'especificaciones' => $request->especificaciones,
            'imagen' => $rutaImagen,
            'destacado' => $request->has('destacado') ? 1 : 0,
            'estado' => 'Disponible',
        ]);

        return redirect()->route('admin.productos.index')->with('success', '¡Producto agregado exitosamente al catálogo!');
    }

    // Mostrar formulario para editar un producto existente
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar el producto en la base de datos
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'destacado' => 'nullable|boolean',
        ]);

        $rutaImagen = $producto->imagen;

        // Si sube una nueva imagen, la reemplazamos
        if ($request->hasFile('imagen')) {
            if ($producto->imagen && file_exists(public_path($producto->imagen)) && $producto->imagen != 'img/img_maquitec1.jpg') {
                @unlink(public_path($producto->imagen));
            }

            $imagenFile = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagenFile->getClientOriginalName();
            $imagenFile->move(public_path('img/productos'), $nombreImagen);
            $rutaImagen = 'img/productos/' . $nombreImagen;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'codigo' => $request->codigo ?? $producto->codigo,
            'categoria_id' => $request->categoria_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'especificaciones' => $request->especificaciones,
            'imagen' => $rutaImagen,
            'destacado' => $request->has('destacado') ? 1 : 0,
        ]);

        return redirect()->route('admin.productos.index')->with('success', '¡Producto actualizado correctamente!');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        
        // Borrar archivo físico de imagen si existe y no es la por defecto
        if ($producto->imagen && file_exists(public_path($producto->imagen)) && $producto->imagen != 'img/img_maquitec1.jpg') {
            @unlink(public_path($producto->imagen));
        }

        $producto->delete();
        return back()->with('success', 'Producto eliminado del catálogo.');
    }
}