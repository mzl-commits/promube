<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::query()
            ->where('visible', true)
            ->orderByDesc('publicado_en')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('public.noticias.index', compact('noticias'));
    }
}
