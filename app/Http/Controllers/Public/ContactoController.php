<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    public function index()
    {
        // Si quisieras, aquí podrías leer datos de una tabla config_contacto
        return view('public.contacto.index');
    }
}
