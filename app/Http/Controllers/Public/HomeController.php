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
        // Traemos solo las 3 últimas para el Home
        $becasDestacadas = Beca::latest()->take(3)->get();
        
        // Mantenemos el resto igual
        $beneficiados    = Beneficiado::latest()->take(4)->get();
        $noticias        = Noticia::latest()->take(3)->get();

        return view('public.home', compact('becasDestacadas', 'beneficiados', 'noticias'));
    }
}