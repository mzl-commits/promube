<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiado extends Model
{
    protected $fillable = [
        'nombre_completo',
        'programa',
        'foto_url',
        'biografia',
        'region',
        'anio',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];
}
