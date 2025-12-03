<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'pregunta',
        'respuesta',
        'orden',
        'visible',
    ];

    protected $casts = [
        'orden' => 'integer',
        'visible' => 'boolean',
    ];
}
