<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Beca;

class BecaController extends Controller
{
    public function index()
    {
        $becas = Beca::latest()->get();
        return view('public.becas.index', compact('becas'));
    }

    // AGREGA ESTE MÉTODO:
    public function show(Beca $beca)
    {
        // Laravel busca automáticamente la beca por el ID de la URL.
        // Retornamos la vista 'show.blade.php' pasándole los datos de ESA beca específica.
        return view('public.becas.show', compact('beca'));
    }
}