<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BecaController;
use App\Http\Controllers\Public\BeneficiadoController;
use App\Http\Controllers\Public\SedeController;
use App\Http\Controllers\Public\NoticiaController;
use App\Http\Controllers\Public\FaqController;
use App\Http\Controllers\Public\ContactoController;

Route::view('/becas/bcp', 'public.becas.bcp')->name('becas.bcp');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/becas', [BecaController::class, 'index'])->name('becas.index');

Route::get('/beneficiados', [BeneficiadoController::class, 'index'])->name('beneficiados.index');

Route::get('/sedes', [SedeController::class, 'index'])->name('sedes.index');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');

Route::get('/preguntas-frecuentes', [FaqController::class, 'index'])->name('faqs.index');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');

Route::get('/becas/{beca}', [BecaController::class, 'show'])->name('becas.show');