<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Beca;
use App\Models\Beneficiado;
use App\Models\Noticia;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos solo las 3 últimas para el Home
        $becasDestacadas = Cache::remember('home_becas', 3600, function () {
            return Beca::latest()->take(3)->get();
        });
        
        // Mantenemos el resto con caché de 1 hora
        $beneficiados = Cache::remember('home_beneficiados', 3600, function () {
            return Beneficiado::latest()->take(4)->get();
        });
        
        $noticias = Cache::remember('home_noticias', 3600, function () {
            return Noticia::latest()->take(3)->get();
        });

        return view('public.home', compact('becasDestacadas', 'beneficiados', 'noticias'));
    }
}