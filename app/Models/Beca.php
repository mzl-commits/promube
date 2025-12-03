<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    protected $fillable = [
        'titulo',
        'tipo',
        'nivel',
        'modalidad',
        'pais',
        'area',
        'resumen',
        'descripcion',
        'beneficios',
        'url_oficial',
        'es_destacada',
    ];

    protected $casts = [
        'es_destacada' => 'boolean',
    ];
}
