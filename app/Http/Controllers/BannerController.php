<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string',
            'enlace' => 'nullable|string|max:255',
            'imagen' => 'required|file|image|mimes:jpg,jpeg,png,webp,gif,bmp|max:2048',
            'activo' => 'nullable|boolean',
        ]);

        $data['imagen'] = $this->storeImage($request);
        $data['activo'] = $request->boolean('activo');
        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner agregado correctamente.');
    }

    public function edit($id)
    {
        return view('admin.banners.edit', ['banner' => Banner::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string',
            'enlace' => 'nullable|string|max:255',
            'imagen' => 'nullable|file|image|mimes:jpg,jpeg,png,webp,gif,bmp|max:2048',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $this->deleteImage($banner->imagen);
            $data['imagen'] = $this->storeImage($request);
        }

        $data['activo'] = $request->boolean('activo');
        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner actualizado correctamente.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $this->deleteImage($banner->imagen);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner eliminado correctamente.');
    }

    private function storeImage(Request $request): string
    {
        $directory = public_path('img/banners');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('imagen');
        $filename = uniqid('banner_', true) . '.' . $file->extension();
        $file->move($directory, $filename);

        return 'img/banners/' . $filename;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'img/banners/')) {
            $fullPath = public_path($path);
            if (is_file($fullPath)) {
                unlink($fullPath);
            }
        }
    }
}