<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'imagen_portada',
        'banner',
        'titulo',
        'subtitulo',
        'descripcion',
        'beneficios',
        'pasos',
    ];

    protected $casts = [
        'beneficios' => 'array',
        'pasos'      => 'array',
    ];
}
