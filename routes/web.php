<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BecaController;
use App\Http\Controllers\Public\BeneficiadoController;
use App\Http\Controllers\Public\SedeController;
use App\Http\Controllers\Public\NoticiaController;
use App\Http\Controllers\Public\FaqController;
use Livewire\Volt\Volt;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/becas', [BecaController::class, 'index'])->name('becas.index');

Route::get('/becas/{beca:slug}', [BecaController::class, 'show'])->name('becas.show');

Route::get('/beneficiados', [BeneficiadoController::class, 'index'])->name('beneficiados');
Route::get('/sedes', [SedeController::class, 'index'])->name('sedes.index');
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/preguntas-frecuentes', [FaqController::class, 'index'])->name('faqs.index');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::view('/admin', 'dashboard')->name('dashboard');
    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Volt::route('/admin/becas', 'admin.becas')->name('admin.becas');
});
