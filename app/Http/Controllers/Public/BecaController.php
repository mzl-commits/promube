<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Beca;

class BecaController extends Controller
{
    public function index()
    {
        $becas = Beca::all();
        return view('public.becas.index', compact('becas'));
    }

    public function show(Beca $beca)   // <— aquí usa el modelo
    {
        return view('public.becas.show', compact('beca'));
    }
}
