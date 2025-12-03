<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Beneficiado;

class BeneficiadoController extends Controller
{
    public function index()
    {
        $beneficiados = Beneficiado::query()
            ->where('visible', true)
            ->orderByDesc('anio')
            ->orderBy('nombre_completo')
            ->get();

        return view('public.beneficiados.index', compact('beneficiados'));
    }
}
