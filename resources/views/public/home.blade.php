@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
    <style>
        /* =========================================
           0. CONFIGURACIÓN BASE & UTILIDADES
           ========================================= */
        :root {
            --primary-rgb: 217, 54, 62; /* #D9363E */
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
        }

        /* =========================================
           1. HERO CINEMÁTICO
           ========================================= */
        .hero-wrapper {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            height: 85vh; 
            min-height: 600px;
            max-height: 900px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            margin-bottom: 4rem;
        }

        .hero-image {
            position: absolute;
            inset: 0;
            background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDVAaXoXAVOSubfh8DH8332sqkkCozu99bI-_J2_0e6fZFDdS5X-5TUjS_r-KkfOLZwYTJE8xrvReZUEt8po5s6s80IQV7B9PbDAUYxunLrFP246DQAAckjyXrAJnJPWhwInZPIqmwa3ICR7CrR8di0_biUhSJEWuMzoyhkJ62NZi3MBobwaMqmSRChlwbKBGSB_GZzFhyOXhHeb1CBymS-zo57uJjUkgdy5oXSYuGtkoSFuoIJOs4TQ3U113xNXFue2QUw2nsHp54');
            background-size: cover;
            background-position: center;
            z-index: 0;
            animation: kenBurns 25s ease-out infinite alternate;
            will-change: transform;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom, 
                rgba(0,0,0,0.2) 0%, 
                rgba(0,0,0,0.5) 50%, 
                rgba(0,0,0,0.8) 100%
            );
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 1000px;
            padding: 0 2rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw + 1rem, 5rem); 
            line-height: 1.1;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }

        .animate-enter {
            opacity: 0;
            transform: translateY(40px);
            filter: blur(10px);
            animation: textReveal 1.2s var(--ease-out-expo) forwards;
        }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.3s; }

        .btn-hero {
            position: relative;
            overflow: hidden;
            background: #D9363E;
            color: white;
            font-weight: 700;
            padding: 1.25rem 3.5rem;
            border-radius: 9999px;
            font-size: 1.1rem;
            letter-spacing: 0.025em;
            transition: all 0.4s var(--ease-out-expo);
            box-shadow: 0 4px 15px rgba(217, 54, 62, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-hero::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 50%; height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.3), transparent);
            transform: skewX(-25deg);
            transition: 0.5s;
        }

        .btn-hero:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 40px -10px rgba(217, 54, 62, 0.6);
            background: #e63b44;
        }
        .btn-hero:hover::after { left: 150%; transition: 0.7s ease-in-out; }

        @keyframes kenBurns { from { transform: scale(1); } to { transform: scale(1.15); } }
        @keyframes textReveal { to { opacity: 1; transform: translateY(0); filter: blur(0); } }

        /* =========================================
           2. BECAS 3D (SUAVIZADO)
           ========================================= */
        .perspective-container {
            perspective: 2500px;
            overflow-x: hidden;
            padding: 2rem 0;
        }
        
        .card-3d-wrapper { transition: transform 0.5s var(--ease-out-expo); }
        .group:hover .card-3d-wrapper { transform: translateY(-5px); }

        .reveal-left, .reveal-right {
            opacity: 0;
            transition: all 1.4s var(--ease-out-expo);
            will-change: transform, opacity;
        }
        
        .reveal-left { transform: translateX(-80px) rotateY(-15deg) scale(0.95); transform-origin: left center; }
        .reveal-right { transform: translateX(80px) rotateY(15deg) scale(0.95); transform-origin: right center; }
        .reveal-left.active, .reveal-right.active { opacity: 1; transform: translateX(0) rotateY(0) scale(1); }

        /* =========================================
           3. TARJETAS MUNICIPALES
           ========================================= */
        .municipality-card {
            background: linear-gradient(145deg, #ffffff, #f3f4f6);
            border: 1px solid rgba(255,255,255,0.5);
            transition: all 0.4s var(--ease-out-expo);
            position: relative;
            z-index: 1;
        }
        .dark .municipality-card {
            background: linear-gradient(145deg, #1f2937, #111827);
            border-color: rgba(255,255,255,0.05);
        }
        .municipality-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px -5px rgba(0,0,0,0.1);
            border-color: rgba(217, 54, 62, 0.3);
        }
        .municipality-badge {
            width: 4.5rem; height: 4.5rem;
            border-radius: 1.25rem;
            background: #1e293b;
            display: flex; align-items: center; justify-content: center;
            transform: rotate(45deg);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transition: transform 0.4s var(--ease-out-expo);
            margin-bottom: 1.5rem;
        }
        .municipality-card:hover .municipality-badge {
            transform: rotate(45deg) scale(1.1);
            background: #D9363E;
        }
        .municipality-badge img {
            transform: rotate(-45deg);
            width: 2.5rem; height: 2.5rem;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        /* =========================================
           4. TESTIMONIOS
           ========================================= */
        .student-profile {
            position: relative;
            background: white;
            border-radius: 1.5rem;
            transition: all 0.4s var(--ease-out-expo);
            border: 1px solid rgba(0,0,0,0.04);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .dark .student-profile { background: #1f2937; border-color: rgba(255,255,255,0.05); }
        .student-profile::before {
            content: '"'; position: absolute; top: 1rem; right: 1.5rem;
            font-size: 4rem; color: rgba(217, 54, 62, 0.1); font-family: serif; line-height: 1;
        }
        .student-profile:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: rgba(217, 54, 62, 0.2);
        }
        .student-img-wrapper { position: relative; }
        .student-img-wrapper::after {
            content: ''; position: absolute; inset: -3px;
            border-radius: 50%; border: 2px solid #D9363E; opacity: 0.5;
        }

        /* =========================================
           5. SEDES
           ========================================= */
        .location-card {
            border-radius: 1.5rem;
            overflow: hidden;
            background: white;
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.4s var(--ease-out-expo);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }
        .dark .location-card { background: #1f2937; border-color: rgba(255,255,255,0.05); }
        .location-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
        .location-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s var(--ease-out-expo); }
        .location-card:hover img { transform: scale(1.05); }
    </style>

    {{-- SECCIÓN 1: HERO --}}
    <section class="container mx-auto px-4 sm:px-6">
        <div class="hero-wrapper">
            <div class="hero-image"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title font-black text-white mb-6 animate-enter">
                    <span class="text-primary inline-block">PROMUBE</span><br/>
                    El Futuro es Tuyo
                </h1>
                <p class="text-lg md:text-2xl text-gray-100 mb-10 font-light max-w-2xl mx-auto animate-enter delay-1">
                    Conectamos talento con oportunidades. Descubre becas y programas educativos diseñados para transformar tu carrera profesional.
                </p>
                <div class="animate-enter delay-2">
                    <a href="#becas" class="btn-hero">
                        Explorar Becas
                        <span class="material-symbols-outlined text-xl">arrow_downward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECCIÓN 2: BECAS (DINÁMICA - MÁX 3) --}}
    <section id="becas" class="py-24 perspective-container overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Oportunidades</span>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white">Becas Destacadas</h2>
            </div>

            {{-- Array de imágenes de respaldo para el bucle --}}
            @php
                $imagenes = [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE', // Edificio
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY', // Laboratorio
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw', // Arte
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAqsDW7Eyzl38NxtWzXWj9ZPNb9fnfDkRhiSR5ugftDifvRlgtJRrJgnObPxcDYoKv0hx6cghdStc9Rr8w-H_A5ixsXT1LSeMWXrD727ymKaPh_kk7h-Ul2txlr3zTIgf806_eYucfUe1WRUPIxzgoca2dwJHdAgu9x0gwM-QgJtuydonoDwuv31yLaQ5D5fpDyKZdATqfnn6BK_1dOlv3YKPsKjv_pCf62uLtgJibEcgS32AoV8eOVKyXEaq1D6g3znWc1vivIYjw', // Laptops
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuB6zVY2V16CGVuc4WNtxW-GpEd3MpEU1wyTOHuWQqEgHLzwbqf05yKK3k2nBdug7uncLU64WSj5tlCmtB_4zAa0TiOYhNJWNkamFFRtRtOPugWEwkMV5iWP9FcOPeoA1je-V16kb-LWsntI2zf-P0JW3iViyI23Qj_9_uLkihF-bJ6LRzwkg-ocWfZzwb0uaCBhESle3HTNAlj4yMaN_PVDw0V8m09VsLeocoJyw-DJqyy8w0FgdKOda0MhoY0rOYbNfRIB3iojjyE'  // Deporte
                ];
            @endphp

            <div class="space-y-32"> 
                @forelse($becasDestacadas as $index => $beca)
                    {{-- Selección de imagen cíclica --}}
                    @php $imgSrc = $imagenes[$index % count($imagenes)]; @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center group">
                        
                        {{-- Alternancia de imagen (Izq/Der) --}}
                        <div class="relative card-3d-wrapper {{ $loop->even ? 'md:order-2 reveal-right' : 'reveal-left' }}">
                            <img alt="{{ $beca->titulo }}" class="rounded-2xl shadow-2xl w-full h-auto object-cover aspect-[4/3]" src="{{ $imgSrc }}"/>
                        </div>
                        
                        <div class="{{ $loop->even ? 'md:order-1 reveal-left' : 'reveal-right' }}">
                            <h3 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">{{ $beca->titulo }}</h3>
                            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
                                {{ $beca->resumen ?? Str::limit($beca->descripcion, 150) }}
                            </p>
                            <a href="{{ route('becas.show', $beca->id) }}" class="text-primary font-bold hover:text-red-700 transition-colors flex items-center group/link text-lg">
                                Ver detalles <span class="material-symbols-outlined ml-2 transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-10">
                        <p>No hay becas destacadas en este momento.</p>
                    </div>
                @endforelse
            </div>

            {{-- BOTÓN "VER MÁS" --}}
            <div class="mt-24 text-center">
                <a href="{{ route('becas.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all bg-gray-900 rounded-full hover:bg-primary hover:shadow-lg dark:bg-gray-700 dark:hover:bg-primary group">
                    Ver todas las becas
                    <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-6"><hr class="border-t border-gray-200 dark:border-gray-700 opacity-50"/></div>

    {{-- SECCIÓN 3: MUNICIPALIDADES --}}
    <section class="py-24 bg-gray-50 dark:bg-[#151515]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                 <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white">Municipalidades Afiliadas</h2>
                 <p class="text-gray-500 mt-4 max-w-xl mx-auto">Trabajamos de la mano con gobiernos locales para extender el alcance de nuestros programas.</p>
            </div>
           
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8" data-municipios-grid>
                @foreach(['Centro', 'Norte', 'Sur', 'Occidente'] as $index => $muni)
                <div class="municipality-card p-8 rounded-2xl flex flex-col items-center justify-center text-center cursor-default">
                    <div class="municipality-badge">
                        {{-- Usamos índices 8, 9, 10, 11 para las imágenes de escudos --}}
                        <img alt="Escudo municipal {{ $muni }}" src="http://googleusercontent.com/profile/picture/{{ 8 + $index }}"/>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $muni }}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECCIÓN 4: ALUMNOS --}}
    <section class="py-24 bg-white dark:bg-background-dark relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-red-500/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-center mb-16 text-gray-800 dark:text-white">Historias de Éxito</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                
                {{-- Alumnos (Iteramos beneficiados reales o usamos estáticos si la DB está vacía) --}}
                @forelse($beneficiados as $beneficiado)
                    <div class="student-profile p-8 flex items-start sm:items-center space-x-6">
                        <div class="student-img-wrapper flex-shrink-0">
                             <img alt="Retrato de {{ $beneficiado->nombre }}" class="w-24 h-24 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"/>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 dark:text-white">{{ $beneficiado->nombre }}</h4>
                            <p class="text-sm text-primary font-bold uppercase tracking-wide mb-3">{{ $beneficiado->beca->tipo ?? 'Beca' }}</p>
                            <p class="text-gray-600 dark:text-gray-300 italic text-base leading-relaxed">"{{ $beneficiado->testimonio ?? 'Gracias a PROMUBE pude cumplir mis sueños.' }}"</p>
                        </div>
                    </div>
                @empty
                    {{-- Fallback estático para diseño --}}
                    <div class="student-profile p-8 flex items-start sm:items-center space-x-6">
                        <div class="student-img-wrapper flex-shrink-0">
                             <img alt="Retrato de Juan Pérez" class="w-24 h-24 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"/>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 dark:text-white">Juan Pérez</h4>
                            <p class="text-sm text-primary font-bold uppercase tracking-wide mb-3">Beca Académica '23</p>
                            <p class="text-gray-600 dark:text-gray-300 italic text-base leading-relaxed">"Gracias a PROMUBE, pude acceder a una educación de calidad que transformó mi carrera para siempre."</p>
                        </div>
                    </div>
                    <div class="student-profile p-8 flex items-start sm:items-center space-x-6">
                        <div class="student-img-wrapper flex-shrink-0">
                             <img alt="Retrato de María García" class="w-24 h-24 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtZ-CDAub-k25C4b9XHiXcP0q16s7jyp--A98FEULKdN6R99TRO7jCEn7soMCu9VczjFwRGuSpZTbPR7Hl8qNDI8Coin03EQHTnH01taic6T6bllrywSEqL8yo5bblqJfodvqYWQPzNXpX9uLsM2sVm9cGA1adwoCvg5AIQglOargmdcdRIOElkK0xRgLOhveHlE07f6pc97NfOrETObngAqGe2EO_2YZekdnph3pEylqDu7aaT35jixS1RR-MEYE_3zFgCrcIM4o"/>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 dark:text-white">María García</h4>
                            <p class="text-sm text-primary font-bold uppercase tracking-wide mb-3">Intercambio '22</p>
                            <p class="text-gray-600 dark:text-gray-300 italic text-base leading-relaxed">"La experiencia del intercambio cultural amplió mis horizontes y me abrió puertas internacionales."</p>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    <div class="container mx-auto px-6"><hr class="border-t border-gray-200 dark:border-gray-700 opacity-50"/></div>

    {{-- SECCIÓN 5: SEDES --}}
    <section class="py-24 bg-gray-50 dark:bg-[#121212]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-gray-800 dark:text-white">Nuestras Sedes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="location-card group">
                    <div class="location-image-container">
                        <img alt="Edificio de oficinas moderno CIDECH" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd2_H08jilsWIyRClEVK8eRTHnJGc3jQKquVDiSoNGEmoEB0C6UCpS7WeA8aDPrO52EOkPAKHDWRSSDC-CvWlIn_NF_xhC7D77LVrpgHAWwwZUYdgrD9MNYUhAJPn7H1g40rCQNKpMSsI8w1pnFQnDuHRLeFLZ5JWnmxFqjoby8WiAddfI1QE-0yVUXwJn1BOTldsaWXw3NK5bk6E1Nd9-wP0qxr1pTSn0WZul-HeY6eu5E7RZpploWOPfTa6-5N3ra-k2AbbdoYI"/>
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Central</h3>
                            <span class="bg-primary/10 text-primary text-xs font-bold px-3 py-1 rounded-full">CDMX</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-2 text-base"><span class="font-semibold text-gray-900 dark:text-white">Dirección:</span> Av. Universidad 1234, Col. Centro.</p>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 text-base"><span class="font-semibold text-gray-900 dark:text-white">Horario:</span> Lun-Vie, 9am - 6pm.</p>
                        <a href="#" class="block text-center w-full border-2 border-primary text-primary font-bold py-3 px-6 rounded-xl hover:bg-primary hover:text-white transition-all duration-300">
                            Ver ubicación en mapa
                        </a>
                    </div>
                </div>
                <div class="location-card group">
                    <div class="location-image-container">
                        <img alt="Parque de oficinas corporativas Sede Norte" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiapKTJC8xcc7tkIfBrgC_FyqQlJ9OJ2UKNO07Zn7DYyoBJF-WSsgB3AJ_Qhuv7-n7N4D4xk7E2__eeQkdC-7ITFPyjGPBCmN8uiFtl4rnFbeT7t4ioAKfwjUFfFDDgijzBfMFgvVpiWS-EHiaKdNeGqoWFXOVphvMsFx1MQu2nNeoG_hJDWRV9YXisLjkhE7v3j69MJquAhDtDOEppbV4pOiJjzhINDrhZ36WrXQ0YL0a2VTepauikYBVK6jYxgyx55XuPnwaVZs"/>
                    </div>
                    <div class="p-8">
                         <div class="flex justify-between items-start mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Norte</h3>
                            <span class="bg-primary/10 text-primary text-xs font-bold px-3 py-1 rounded-full">Monterrey</span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-2 text-base"><span class="font-semibold text-gray-900 dark:text-white">Dirección:</span> Calle del Sol 567, Plaza Norte.</p>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 text-base"><span class="font-semibold text-gray-900 dark:text-white">Horario:</span> Lun-Vie, 10am - 5pm.</p>
                        <a href="#" class="block text-center w-full border-2 border-primary text-primary font-bold py-3 px-6 rounded-xl hover:bg-primary hover:text-white transition-all duration-300">
                            Ver ubicación en mapa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SCRIPTS DE INTERACCIÓN --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Observer optimizado
            const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        requestAnimationFrame(() => {
                            entry.target.classList.add('active');
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.reveal-left, .reveal-right').forEach(el => observer.observe(el));

            // Rotación de Municipalidades
            const muniContainer = document.querySelector('[data-municipios-grid]');
            if (muniContainer) {
                let isPaused = false;
                muniContainer.addEventListener('mouseenter', () => isPaused = true);
                muniContainer.addEventListener('mouseleave', () => isPaused = false);

                setInterval(() => {
                    if (!isPaused) {
                        const last = muniContainer.lastElementChild;
                        if (last) {
                            muniContainer.insertBefore(last, muniContainer.firstElementChild);
                        }
                    }
                }, 4000);
            }
        });
    </script>
@endsection