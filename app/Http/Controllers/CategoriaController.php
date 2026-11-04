<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Listar todas las categorÃ­as (Panel Admin)
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

    // Mostrar una categorÃ­a especÃ­fica de cara al cliente pÃºblico
    public function show($id)
    {
        $categoria = Categoria::with('productos')->findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    // Mostrar formulario de creaciÃ³n
    public function create()
    {
        $categoriasPadre = Categoria::whereNull('parent_id')->orderBy('nombre')->get();
        return view('admin.categorias.create', compact('categoriasPadre'));
    }

    // Guardar nueva categorÃ­a
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'parent_id' => ['nullable', 'integer', Rule::exists('categorias', 'id')->whereNull('parent_id')],
        ]);

        // Nota: Si generas slugs automÃ¡ticamente por model o request, asegÃºrate de incluirlo aquÃ­ si es necesario
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categorias.index')->with('success', 'Â¡CategorÃ­a creada exitosamente!');
    }

    // Mostrar formulario de ediciÃ³n
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoriasPadre = Categoria::whereNull('parent_id')
            ->whereKeyNot($categoria->id)
            ->orderBy('nombre')
            ->get();
        return view('admin.categorias.edit', compact('categoria', 'categoriasPadre'));
    }

    // Actualizar categorÃ­a
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

        return redirect()->route('admin.categorias.index')->with('success', 'Â¡CategorÃ­a actualizada correctamente!');
    }

    // Eliminar categorÃ­a
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        
        if ($categoria->productos()->count() > 0) {
            return back()->with('error', 'No se puede eliminar la categorÃ­a porque tiene productos asignados.');
        }

        if ($categoria->children()->exists()) {
            return back()->with('error', 'No se puede eliminar la categorÃ­a porque tiene subcategorÃ­as asignadas.');
        }

        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'CategorÃ­a eliminada con Ã©xito.');
    }
}