<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()
            ->where('visible', true)
            ->orderBy('orden')
            ->orderBy('id')
            ->get();

        return view('public.faqs.index', compact('faqs'));
    }
}
