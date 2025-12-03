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
}
