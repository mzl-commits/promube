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
            ->paginate(12);

        return view('public.beneficiados.index', compact('beneficiados'));
    }
}
