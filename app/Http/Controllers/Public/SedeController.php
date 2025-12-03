<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Sede;

class SedeController extends Controller
{
    public function index()
    {
        $sedes = Sede::query()
            ->orderBy('departamento')
            ->orderBy('ciudad')
            ->orderBy('nombre')
            ->get();

        return view('public.sedes.index', compact('sedes'));
    }
}
