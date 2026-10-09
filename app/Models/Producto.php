<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Permitir asignación masiva en todos los campos
    protected $guarded = [];

    protected $casts = [
        'imagenes' => 'array',
    ];

    public function getGalleryImagesAttribute(): array
    {
        $images = $this->imagenes ?? [];

        if ($this->imagen && ! in_array($this->imagen, $images, true)) {
            array_unshift($images, $this->imagen);
        }

        return array_values(array_unique(array_filter($images, 'is_string')));
    }

    // Relación: Un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}