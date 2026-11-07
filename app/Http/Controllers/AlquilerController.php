<?php

namespace App\Http\Controllers;

use App\Mail\RentalQuoteRequestReceived;
use App\Models\Alquiler;
use App\Models\AlquilerConsulta;
use App\Models\Interaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AlquilerController extends Controller
{
    public function index()
    {
        $alquileres = Alquiler::where('activo', true)
            ->orderByDesc('destacado')
            ->latest()
            ->paginate(12);

        return view('alquileres', compact('alquileres'));
    }

    public function show(string $slug)
    {
        $alquiler = Alquiler::where('slug', $slug)->where('activo', true)->firstOrFail();

        return view('alquiler-cotizar', compact('alquiler'));
    }

    public function consultar(Request $request, string $slug)
    {
        $alquiler = Alquiler::where('slug', $slug)->where('activo', true)->firstOrFail();

        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'empresa' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'max:50'],
            'mensaje' => ['required', 'string', 'max:5000'],
        ]);

        if (in_array(config('mail.default'), ['log', 'array'], true)) {
            return back()->withInput()->withErrors([
                'quote' => 'El correo no está configurado para envío. Contacte al administrador.',
            ]);
        }

        $quote = [
            ...$data,
            'alquiler_nombre' => $alquiler->nombre,
            'alquiler_marca' => $alquiler->marca,
            'alquiler_toneladas' => $alquiler->toneladas,
            'alquiler_combustible' => $alquiler->combustible,
            'alquiler_altura_maxima' => $alquiler->altura_maxima,
            'alquiler_ancho_pasillo' => $alquiler->ancho_pasillo,
            'alquiler_estado' => $alquiler->estado,
            'alquiler_descripcion' => $alquiler->descripcion,
            'alquiler_imagen' => $alquiler->imagen ?: ($alquiler->gallery_images[0] ?? null),
        ];

        try {
            Mail::to(config('mail.quote_to'))->send(
                new RentalQuoteRequestReceived($quote)
            );

            AlquilerConsulta::create([
                ...$data,
                'alquiler_id' => $alquiler->id,
                'ip' => $request->ip(),
            ]);

            Interaccion::create([
                'tipo' => 'alquiler',
                'item' => $alquiler->nombre,
                'canal' => 'cotizacion',
                'accion' => 'consulta_real',
                'ip' => $request->ip(),
                'user_id' => $request->user()?->id,
            ]);
        } catch (\Throwable $exception) {
            report($exception);

            return back()->withInput()->withErrors([
                'quote' => 'No se pudo enviar la solicitud. Revisa tu conexión o inténtalo nuevamente.',
            ]);
        }

        return back()->with('message', 'Tu consulta fue registrada correctamente. Nos pondremos en contacto contigo pronto.');
    }

    public function adminIndex()
    {
        $alquileres = Alquiler::withCount('consultas')
            ->when(request('buscar'), function ($query, $buscar) {
                $query->where(function ($query) use ($buscar) {
                    $query->where('nombre', 'like', '%'.$buscar.'%')
                        ->orWhere('marca', 'like', '%'.$buscar.'%');
                });
            })
            ->when(request('estado'), fn ($query, $estado) => $query->where('estado', $estado))
            ->when(request()->filled('activo'), fn ($query) => $query->where('activo', request('activo')))
            ->latest()
            ->paginate(15);

        return view('admin.alquileres.index', compact('alquileres'));
    }

    public function create()
    {
        return view('admin.alquileres.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateEquipment($request);
        $files = $request->file('imagenes', []);
        $images = $this->storeImages($files);

        $data['imagenes'] = $images;
        $data['imagen'] = $images[0] ?? null;
        $data['slug'] = $this->uniqueSlug($data['nombre']);
        $data['activo'] = $request->boolean('activo');
        $data['destacado'] = $request->boolean('destacado');

        Alquiler::create($data);

        return redirect()->route('admin.alquileres.index')->with('success', 'Equipo de alquiler agregado correctamente.');
    }

    public function edit(Alquiler $alquiler)
    {
        return view('admin.alquileres.edit', compact('alquiler'));
    }

    public function update(Request $request, Alquiler $alquiler)
    {
        $data = $this->validateEquipment($request, false);
        $current = $alquiler->gallery_images;
        $toDelete = array_values(array_intersect($current, $request->input('eliminar_imagenes', [])));
        $images = array_values(array_diff($current, $toDelete));
        $newFiles = $request->file('imagenes', []);

        if (count($images) + count($newFiles) > 4) {
            throw ValidationException::withMessages([
                'imagenes' => 'El equipo puede tener como máximo 4 imágenes en total.',
            ]);
        }

        $images = array_merge($images, $this->storeImages($newFiles));

        $data['imagenes'] = $images;
        $data['imagen'] = $images[0] ?? null;
        $data['slug'] = $this->uniqueSlug($data['nombre'], $alquiler->id);
        $data['activo'] = $request->boolean('activo');
        $data['destacado'] = $request->boolean('destacado');
        $alquiler->update($data);

        foreach ($toDelete as $image) {
            $this->deleteImage($image);
        }

        return redirect()->route('admin.alquileres.index')->with('success', 'Equipo de alquiler actualizado correctamente.');
    }

    public function destroy(Alquiler $alquiler)
    {
        foreach ($alquiler->gallery_images as $image) {
            $this->deleteImage($image);
        }
        $alquiler->delete();

        return redirect()->route('admin.alquileres.index')->with('success', 'Equipo de alquiler eliminado correctamente.');
    }

    private function validateEquipment(Request $request, bool $imageRequired = true): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'marca' => ['nullable', 'string', 'max:100'],
            'toneladas' => ['nullable', 'numeric', 'min:0', 'max:9999'],
            'combustible' => ['required', 'in:gasolina,gas,electrico,ambos'],
            'altura_maxima' => ['nullable', 'integer', 'min:0', 'max:999999'],
            'ancho_pasillo' => ['nullable', 'integer', 'min:0', 'max:999999'],
            'estado' => ['required', 'in:disponible,mantenimiento,en_servicio'],
            'descripcion' => ['nullable', 'string', 'max:5000'],
            'especificaciones' => ['nullable', 'string', 'max:5000'],
            'imagenes' => [$imageRequired ? 'required' : 'nullable', 'array', 'max:4'],
            'imagenes.*' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'activo' => ['nullable', 'boolean'],
            'destacado' => ['nullable', 'boolean'],
            'eliminar_imagenes' => ['nullable', 'array'],
        ]);
    }

    private function uniqueSlug(string $nombre, ?int $ignoreId = null): string
    {
        $base = Str::slug($nombre);
        $slug = $base;
        $counter = 2;

        while (Alquiler::where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$counter++;
        }

        return $slug;
    }

    private function storeImages(array $files): array
    {
        $directory = public_path('img/alquileres');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $stored = [];
        foreach ($files as $file) {
            if (! $file->isValid()) {
                continue;
            }
            $filename = uniqid('alquiler_', true).'.'.$file->extension();
            $file->move($directory, $filename);
            $stored[] = 'img/alquileres/'.$filename;
        }

        return $stored;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'img/alquileres/') && is_file(public_path($path))) {
            unlink(public_path($path));
        }
    }
}
