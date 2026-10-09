<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Listar todas las categorías (Panel Admin)
    public function index()
    {
        $categorias = Categoria::with(['parent', 'children' => function ($query) {
                $query->orderBy('nombre');
            }])
            ->whereNull('parent_id')
            ->orderBy('nombre')
            ->get();
        return view('admin.categorias.index', compact('categorias'));
    }

    // Mostrar una categoría específica de cara al cliente público
    public function show($id)
    {
        $categoria = Categoria::with('productos')->findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $categoriasPadre = Categoria::whereNull('parent_id')->orderBy('nombre')->get();
        return view('admin.categorias.create', compact('categoriasPadre'));
    }

    // Guardar nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'parent_id' => ['nullable', 'integer', Rule::exists('categorias', 'id')->whereNull('parent_id')],
        ]);

        // Nota: Si generas slugs automáticamente por model o request, asegúrate de incluirlo aquí si es necesario
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categorias.index')->with('success', '¡Categoría creada exitosamente!');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoriasPadre = Categoria::whereNull('parent_id')
            ->whereKeyNot($categoria->id)
            ->orderBy('nombre')
            ->get();
        return view('admin.categorias.edit', compact('categoria', 'categoriasPadre'));
    }

    // Actualizar categoría
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('categorias', 'id')->whereNull('parent_id'),
                Rule::notIn([$categoria->id]),
                Rule::prohibitedIf($categoria->children()->exists()),
            ],
        ]);

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categorias.index')->with('success', '¡Categoría actualizada correctamente!');
    }

    // Eliminar categoría
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        
        if ($categoria->productos()->count() > 0) {
            return back()->with('error', 'No se puede eliminar la categoría porque tiene productos asignados.');
        }

        if ($categoria->children()->exists()) {
            return back()->with('error', 'No se puede eliminar la categoría porque tiene subcategorías asignadas.');
        }

        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }
}