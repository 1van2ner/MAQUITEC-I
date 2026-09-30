<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('rol', 'like', "%{$search}%");
            });
        }

        if ($request->filled('rol') && $request->rol !== 'todos') {
            $query->where('rol', $request->rol);
        }

        if ($request->filled('dia')) {
            $dia = $request->dia;

            try {
                $fecha = Carbon::parse($dia)->format('Y-m-d');
                $query->whereDate('created_at', $fecha);
            } catch (\Exception $e) {
                $query->whereRaw('1 = 0');
            }
        }

        $usuarios = $query->orderBy('id', 'asc')->get();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $validated = $request->validate([
            'rol' => 'required|in:Cliente,Administrador',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        $usuario->update($validated);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        
        if (auth()->id() === $usuario->id) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta de administrador.');
        }

        $usuario->delete();
        return back()->with('success', 'Usuario eliminado del sistema.');
    }
}