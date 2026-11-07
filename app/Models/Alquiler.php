<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $table = 'alquileres';

    protected $fillable = [
        'nombre',
        'slug',
        'marca',
        'toneladas',
        'combustible',
        'altura_maxima',
        'ancho_pasillo',
        'estado',
        'descripcion',
        'especificaciones',
        'imagen',
        'imagenes',
        'activo',
        'destacado',
    ];

    protected $casts = [
        'toneladas' => 'decimal:2',
        'imagenes' => 'array',
        'activo' => 'boolean',
        'destacado' => 'boolean',
    ];

    public function consultas()
    {
        return $this->hasMany(AlquilerConsulta::class);
    }

    public function getGalleryImagesAttribute(): array
    {
        $images = $this->imagenes ?? [];
        if ($this->imagen && ! in_array($this->imagen, $images, true)) {
            array_unshift($images, $this->imagen);
        }

        return array_values(array_unique(array_filter($images, 'is_string')));
    }
}
