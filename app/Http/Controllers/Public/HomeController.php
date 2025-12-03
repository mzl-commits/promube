<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Beca;
use App\Models\Beneficiado;
use App\Models\Noticia;

class HomeController extends Controller
{
    public function index()
    {
        // Ejemplo: últimas 3 becas, 4 beneficiados, 3 noticias
        $becasDestacadas = Beca::latest()->take(3)->get();
        $beneficiados    = Beneficiado::latest()->take(4)->get();
        $noticias        = Noticia::latest()->take(3)->get();

        return view('public.home', compact('becasDestacadas', 'beneficiados', 'noticias'));
    }
}
