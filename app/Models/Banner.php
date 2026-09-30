<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'titulo',
        'subtitulo',
        'imagen',
        'enlace',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
