<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'resumen',
        'contenido',
        'imagen_url',
        'publicado_en',
        'visible',
    ];

    protected $casts = [
        'publicado_en' => 'date',
        'visible' => 'boolean',
    ];
}
