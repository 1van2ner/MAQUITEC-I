<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    // Listar productos en la vista pública con filtrado por categoría, barra lateral y paginación
    public function index(Request $request)
    {
        // Obtenemos todas las categorías con el conteo de sus productos para el sidebar
        $categorias = Categoria::with(['children' => function ($query) {
            $query->withCount('productos')->orderBy('nombre');
        }])
            ->withCount('productos')
            ->whereNull('parent_id')
            ->orderBy('nombre')
            ->get();
        
        // Total general de productos
        $totalProductos = Producto::count();

        // Creamos la consulta base para los productos
        $query = Producto::with('categoria');

        // Si el usuario hizo clic en una categoría del sidebar, filtramos
        if ($request->has('categoria') && $request->categoria != '') {
            $categoriaActual = Categoria::with('children')->find($request->categoria);
            $categoriaIds = $categoriaActual
                ? $categoriaActual->children->pluck('id')->push($categoriaActual->id)
                : [$request->categoria];
            $query->whereIn('categoria_id', $categoriaIds);
        } else {
            $categoriaActual = null;
        }

        // Paginación de 12 productos por página para la vista pública
        $productos = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('productos', compact('categorias', 'productos', 'totalProductos', 'categoriaActual'));
    }

    // Listar productos en el panel de administración
    public function adminIndex(Request $request)
    {
        $query = Producto::with('categoria');

        if ($request->filled('buscar')) {
            $buscar = trim($request->input('buscar'));
            $query->where(function ($query) use ($buscar) {
                $query->where('nombre', 'like', '%' . $buscar . '%')
                    ->orWhere('codigo', 'like', '%' . $buscar . '%');
            });
        }

        if ($request->input('destacado') === '1') {
            $query->where('destacado', true);
        }

        $productos = $query->orderByDesc('destacado')
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.productos.index', compact('productos'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        $categorias = Categoria::with('parent')->orderBy('parent_id')->orderBy('nombre')->get();
        return view('admin.productos.create', compact('categorias'));
    }

    // Guardar el nuevo producto en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagenes' => 'required|array|min:1|max:4',
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'destacado' => 'nullable|boolean',
        ]);

        $imagenes = $this->storeProductImages($request->file('imagenes', []));

        Producto::create([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'codigo' => $request->codigo ?? 'MAQ-' . rand(1000, 9999),
            'categoria_id' => $request->categoria_id,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'especificaciones' => $request->especificaciones,
            'imagen' => $imagenes[0] ?? 'img/img_maquitec1.jpg',
            'imagenes' => $imagenes,
            'destacado' => $request->has('destacado') ? 1 : 0,
            'estado' => 'Disponible',
        ]);

        return redirect()->route('admin.productos.index')->with('success', '¡Producto agregado exitosamente al catálogo!');
    }

    // Mostrar formulario para editar un producto existente
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::with('parent')->orderBy('parent_id')->orderBy('nombre')->get();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar el producto en la base de datos
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $imagenesActuales = $producto->gallery_images ?? [];
        $imagenesSolicitadas = collect($request->input('eliminar_imagenes', []))
            ->filter(fn ($image) => is_string($image))
            ->values()
            ->all();
        $imagenesAEliminar = array_values(array_intersect($imagenesSolicitadas, $imagenesActuales));
        $imagenesConservadas = array_values(array_diff($imagenesActuales, $imagenesAEliminar));

        $maxImagenesRestantes = max(0, 4 - count($imagenesConservadas));

        $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'eliminar_imagenes' => 'nullable|array',
            'eliminar_imagenes.*' => ['required', 'string', Rule::in($imagenesActuales)],
            'imagenes' => ['nullable', 'array', 'max:' . $maxImagenesRestantes],
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'destacado' => 'nullable|boolean',
        ]);

        $imagenes = array_merge(
            $imagenesConservadas,
            $this->storeProductImages($request->file('imagenes', []))
        );

        $producto->update([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'codigo' => $request->codigo ?? $producto->codigo,
            'categoria_id' => $request->categoria_id,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'especificaciones' => $request->especificaciones,
            'imagen' => $imagenes[0] ?? 'img/img_maquitec1.jpg',
            'imagenes' => $imagenes,
            'destacado' => $request->has('destacado') ? 1 : 0,
        ]);

        foreach ($imagenesAEliminar as $imagen) {
            $this->deleteProductImage($imagen);
        }

        return redirect()->route('admin.productos.index')->with('success', '¡Producto actualizado correctamente!');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        
        $imagenes = $producto->gallery_images ?? [];
        foreach ($imagenes as $imagen) {
            $this->deleteProductImage($imagen);
        }

        $producto->delete();
        return back()->with('success', 'Producto eliminado del catálogo.');
    }

    private function storeProductImages(array $uploads): array
    {
        $directory = public_path('img/productos');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        return array_map(function ($image) use ($directory) {
            $filename = Str::uuid() . '.' . $image->extension();
            $image->move($directory, $filename);

            return 'img/productos/' . $filename;
        }, $uploads);
    }

    private function deleteProductImage(string $image): void
    {
        $image = str_replace('\\', '/', ltrim($image, '/'));

        if (! str_starts_with($image, 'img/productos/')) {
            return;
        }

        $path = public_path($image);

        if (is_file($path)) {
            @unlink($path);
        }
    }
}