<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlquilerConsulta extends Model
{
    use HasFactory;

    protected $table = 'alquiler_consultas';

    protected $fillable = [
        'alquiler_id',
        'nombre',
        'empresa',
        'email',
        'telefono',
        'mensaje',
        'estado',
        'ip',
    ];

    public function alquiler()
    {
        return $this->belongsTo(Alquiler::class);
    }
}
