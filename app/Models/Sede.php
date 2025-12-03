<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'departamento',
        'telefono',
        'correo_contacto',
        'horario',
        'google_maps_url',
    ];
}
