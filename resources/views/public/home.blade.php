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
           1. HERO FULL SCREEN (ESTILO CINEMÁTICO)
           ========================================= */
        .hero-wrapper {
            position: relative;
            width: 100vw;
            height: 100vh; /* Pantalla completa */
            margin-left: calc(-50vw + 50%); /* Romper el contenedor */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0;
            background-color: #000; /* Fondo base negro */
        }

        .hero-image {
            position: absolute;
            inset: 0;
            background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDVAaXoXAVOSubfh8DH8332sqkkCozu99bI-_J2_0e6fZFDdS5X-5TUjS_r-KkfOLZwYTJE8xrvReZUEt8po5s6s80IQV7B9PbDAUYxunLrFP246DQAAckjyXrAJnJPWhwInZPIqmwa3ICR7CrR8di0_biUhSJEWuMzoyhkJ62NZi3MBobwaMqmSRChlwbKBGSB_GZzFhyOXhHeb1CBymS-zo57uJjUkgdy5oXSYuGtkoSFuoIJOs4TQ3U113xNXFue2QUw2nsHp54');
            background-size: cover;
            background-position: center;
            z-index: 0;
            opacity: 0.8;
            /* Animación suave de zoom y paneo */
            animation: kenBurns 40s ease-out infinite alternate;
            will-change: transform;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            /* Degradado cinemático para legibilidad perfecta */
            background: radial-gradient(circle at center, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.8) 100%);
            z-index: 1;
            backdrop-filter: blur(3px); /* Toque de cristal esmerilado */
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 1400px; /* Ancho máximo amplio */
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
        }

        /* Título Principal (Eslogan recuperado) */
        .hero-title {
            /* Tipografía fluida y masiva */
            font-size: clamp(2.5rem, 5vw + 1rem, 5.5rem); 
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: -0.02em;
            color: white;
            text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            font-size: clamp(1.2rem, 2vw, 2rem);
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            margin-bottom: 1rem;
            max-width: 800px;
        }

        /* Efecto Máquina de Escribir (Estilizado) */
        .typewriter-wrapper {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            border-radius: 99px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            margin-top: 1rem;
        }

        .typewriter-text {
            font-family: monospace, sans-serif; /* Fuente tecnológica */
            font-size: clamp(1.2rem, 2.5vw, 2rem);
            font-weight: 700;
            color: #D9363E; /* Color primario brillante */
            text-shadow: 0 0 20px rgba(217, 54, 62, 0.4);
            min-width: 10px;
        }

        .cursor {
            display: inline-block;
            width: 3px;
            height: 1.2em;
            background-color: white;
            margin-left: 5px;
            animation: blink 1s step-end infinite;
        }

        /* Indicador de Scroll */
        .scroll-indicator {
            position: absolute;
            bottom: 3rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            flex-col: column;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .scroll-indicator:hover { color: white; }
        .scroll-indicator span:last-child {
            font-size: 2.5rem;
            animation: bounce 2s infinite;
        }

        @keyframes kenBurns {
            from { transform: scale(1); }
            to { transform: scale(1.25); }
        }
        @keyframes blink { 50% { opacity: 0; } }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-10px);}
            60% {transform: translateY(-5px);}
        }

        /* =========================================
           2. ESTILOS RESTO DE LA PÁGINA (MANTENIDOS)
           ========================================= */
        /* Becas 3D */
        .perspective-container { perspective: 2500px; overflow-x: hidden; padding: 4rem 0; }
        .card-3d-wrapper { transition: transform 0.6s var(--ease-out-expo); }
        .group:hover .card-3d-wrapper { transform: scale(1.02) translateY(-10px); }
        .reveal-left, .reveal-right { opacity: 0; transition: all 1.2s var(--ease-out-expo); will-change: transform, opacity; }
        .reveal-left { transform: translateX(-80px) rotateY(-10deg) scale(0.95); transform-origin: left center; }
        .reveal-right { transform: translateX(80px) rotateY(10deg) scale(0.95); transform-origin: right center; }
        .reveal-left.active, .reveal-right.active { opacity: 1; transform: translateX(0) rotateY(0) scale(1); }

        /* Municipalidades */
        .municipality-card { background: linear-gradient(145deg, #ffffff, #f9fafb); border: 1px solid rgba(0,0,0,0.05); transition: all 0.4s ease; z-index:1; }
        .dark .municipality-card { background: linear-gradient(145deg, #1f2937, #111827); border-color: rgba(255,255,255,0.05); }
        .municipality-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1); border-color: rgba(217, 54, 62, 0.4); }
        .municipality-badge { width: 5rem; height: 5rem; border-radius: 1.5rem; background: #0f172a; display: flex; align-items: center; justify-content: center; transform: rotate(45deg); transition: 0.4s ease; margin-bottom: 1.5rem; }
        .municipality-card:hover .municipality-badge { transform: rotate(45deg) scale(1.1); background: #D9363E; box-shadow: 0 0 30px rgba(217, 54, 62, 0.5); }
        .municipality-badge img { transform: rotate(-45deg); width: 2.8rem; height: 2.8rem; object-fit: contain; }

        /* Alumnos & Sedes */
        .student-profile, .location-card { background: white; border-radius: 1.5rem; transition: 0.4s ease; border: 1px solid rgba(0,0,0,0.05); }
        .dark .student-profile, .dark .location-card { background: #1f2937; border-color: rgba(255,255,255,0.05); }
        .student-profile:hover, .location-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15); }
        .location-card img { transition: 0.7s ease; width: 100%; height: 100%; object-fit: cover; }
        .location-card:hover img { transform: scale(1.08); }
    </style>

    {{-- SECCIÓN 1: HERO FULL SCREEN --}}
    <div class="hero-wrapper">
        <div class="hero-image"></div>
        <div class="hero-overlay"></div>
        
        <div class="hero-content animate-fade-in-up">
            {{-- Eslogan Principal --}}
            <h1 class="hero-title">
                <span class="text-primary">PROMUBE</span><br/>
                Promoción de Becas y<br/>
                Programas Educativos
            </h1>
            
            {{-- Subtítulo estático --}}
            <p class="hero-subtitle">
                Conectamos talento con las mejores oportunidades del país.
            </p>

            {{-- Texto Dinámico (Typewriter) --}}
            <div class="typewriter-wrapper">
                <span class="text-gray-300 font-medium mr-2 text-lg">Descubre:</span>
                <span id="typewriter-text" class="typewriter-text"></span>
                <span class="cursor"></span>
            </div>
        </div>

        {{-- Indicador de Scroll --}}
        <a href="#becas" class="scroll-indicator">
            <span class="text-xs uppercase tracking-widest font-bold">Desliza para explorar</span>
            <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
        </a>
    </div>

    {{-- SECCIÓN 2: BECAS DESTACADAS (MÁX 3) --}}
    <section id="becas" class="py-24 perspective-container bg-white dark:bg-[#0a0a0a]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-24">
                <span class="text-primary font-bold tracking-widest uppercase text-xs mb-3 block">Oportunidades Premium</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white">Becas Destacadas</h2>
            </div>

            @php
                // Imágenes de respaldo de alta calidad
                $imagenes = [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE', // Edificio
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY', // Laboratorio
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw', // Arte
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAqsDW7Eyzl38NxtWzXWj9ZPNb9fnfDkRhiSR5ugftDifvRlgtJRrJgnObPxcDYoKv0hx6cghdStc9Rr8w-H_A5ixsXT1LSeMWXrD727ymKaPh_kk7h-Ul2txlr3zTIgf806_eYucfUe1WRUPIxzgoca2dwJHdAgu9x0gwM-QgJtuydonoDwuv31yLaQ5D5fpDyKZdATqfnn6BK_1dOlv3YKPsKjv_pCf62uLtgJibEcgS32AoV8eOVKyXEaq1D6g3znWc1vivIYjw', // Laptops
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuB6zVY2V16CGVuc4WNtxW-GpEd3MpEU1wyTOHuWQqEgHLzwbqf05yKK3k2nBdug7uncLU64WSj5tlCmtB_4zAa0TiOYhNJWNkamFFRtRtOPugWEwkMV5iWP9FcOPeoA1je-V16kb-LWsntI2zf-P0JW3iViyI23Qj_9_uLkihF-bJ6LRzwkg-ocWfZzwb0uaCBhESle3HTNAlj4yMaN_PVDw0V8m09VsLeocoJyw-DJqyy8w0FgdKOda0MhoY0rOYbNfRIB3iojjyE'  // Deporte
                ];
            @endphp

            <div class="space-y-40"> 
                @forelse($becasDestacadas as $index => $beca)
                    @php $imgSrc = $imagenes[$index % count($imagenes)]; @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24 items-center group">
                        {{-- Imagen 3D --}}
                        <div class="relative card-3d-wrapper {{ $loop->even ? 'md:order-2 reveal-right' : 'reveal-left' }}">
                            <img alt="{{ $beca->titulo }}" class="rounded-3xl shadow-2xl w-full h-auto object-cover aspect-[4/3]" src="{{ $imgSrc }}"/>
                            {{-- Badge flotante --}}
                            <div class="absolute top-6 left-6 bg-white/90 dark:bg-black/80 backdrop-blur-md px-4 py-2 rounded-full shadow-lg">
                                <span class="text-xs font-bold uppercase tracking-wider text-primary">{{ $beca->tipo ?? 'Beca' }}</span>
                            </div>
                        </div>
                        
                        {{-- Contenido --}}
                        <div class="{{ $loop->even ? 'md:order-1 reveal-left' : 'reveal-right' }}">
                            <h3 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900 dark:text-white leading-tight">
                                {{ $beca->titulo }}
                            </h3>
                            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
                                {{ $beca->resumen ?? Str::limit($beca->descripcion, 180) }}
                            </p>
                            <a href="{{ route('becas.show', $beca->id) }}" class="inline-flex items-center text-primary font-bold text-lg hover:text-red-700 transition-all group/link">
                                <span class="border-b-2 border-primary pb-1 group-hover/link:border-red-700">Ver detalles completos</span>
                                <span class="material-symbols-outlined ml-2 transform group-hover/link:translate-x-2 transition-transform">arrow_right_alt</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-20 bg-gray-50 dark:bg-gray-900 rounded-3xl border border-dashed border-gray-200 dark:border-gray-800">
                        <p class="text-xl">Próximamente nuevas convocatorias.</p>
                    </div>
                @endforelse
            </div>

            {{-- Botón Ver Más --}}
            <div class="mt-32 text-center">
                <a href="{{ route('becas.index') }}" class="relative inline-flex group">
                    <div class="absolute transition-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt"></div>
                    <button class="relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Explorar Catálogo Completo
                        <span class="material-symbols-outlined ml-2">grid_view</span>
                    </button>
                </a>
            </div>
        </div>
    </section>

    {{-- SEPARADOR VISUAL --}}
    <div class="container mx-auto px-6"><hr class="border-t border-gray-200 dark:border-gray-800 opacity-30"/></div>

    {{-- SECCIÓN 3: MUNICIPALIDADES --}}
    <section class="py-24 bg-gray-50 dark:bg-[#0f0f0f]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                 <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Aliados Estratégicos</h2>
                 <p class="text-gray-500 text-lg">Colaboramos con los gobiernos locales para tu desarrollo.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8" data-municipios-grid>
                @foreach(['Centro', 'Norte', 'Sur', 'Occidente'] as $index => $muni)
                <div class="municipality-card p-8 rounded-3xl flex flex-col items-center justify-center text-center cursor-default">
                    <div class="municipality-badge">
                        <img alt="Escudo {{ $muni }}" src="http://googleusercontent.com/profile/picture/{{ 8 + $index }}"/>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $muni }}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECCIÓN 4: TESTIMONIOS --}}
    <section class="py-24 bg-white dark:bg-black relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-center mb-20 text-gray-900 dark:text-white">Historias Reales</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @forelse($beneficiados as $beneficiado)
                    <div class="student-profile p-8 flex items-start space-x-6 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors">
                        <div class="student-img-wrapper flex-shrink-0">
                             <img alt="{{ $beneficiado->nombre }}" class="w-20 h-20 rounded-full object-cover border-2 border-gray-100 dark:border-gray-800" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"/>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 dark:text-white">{{ $beneficiado->nombre }}</h4>
                            <p class="text-xs font-bold text-primary uppercase tracking-wide mb-3">Becario {{ date('Y') }}</p>
                            <p class="text-gray-600 dark:text-gray-400 italic text-base">"{{ $beneficiado->testimonio ?? 'Una experiencia transformadora.' }}"</p>
                        </div>
                    </div>
                @empty
                    <div class="student-profile p-8 flex items-start space-x-6">
                        <img class="w-20 h-20 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg" alt="Juan">
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 dark:text-white">Juan Pérez</h4>
                            <p class="text-xs font-bold text-primary uppercase mb-2">Beca Excelencia</p>
                            <p class="text-gray-600 dark:text-gray-400 italic">"Gracias a PROMUBE pude estudiar mi carrera soñada."</p>
                        </div>
                    </div>
                    <div class="student-profile p-8 flex items-start space-x-6">
                        <img class="w-20 h-20 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtZ-CDAub-k25C4b9XHiXcP0q16s7jyp--A98FEULKdN6R99TRO7jCEn7soMCu9VczjFwRGuSpZTbPR7Hl8qNDI8Coin03EQHTnH01taic6T6bllrywSEqL8yo5bblqJfodvqYWQPzNXpX9uLsM2sVm9cGA1adwoCvg5AIQglOargmdcdRIOElkK0xRgLOhveHlE07f6pc97NfOrETObngAqGe2EO_2YZekdnph3pEylqDu7aaT35jixS1RR-MEYE_3zFgCrcIM4o" alt="Maria">
                        <div>
                            <h4 class="font-bold text-xl text-gray-900 dark:text-white">María García</h4>
                            <p class="text-xs font-bold text-primary uppercase mb-2">Beca Arte</p>
                            <p class="text-gray-600 dark:text-gray-400 italic">"El apoyo fue fundamental para mi desarrollo artístico."</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- SECCIÓN 5: SEDES --}}
    <section class="py-24 bg-gray-50 dark:bg-[#0a0a0a]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-gray-800 dark:text-white">Nuestras Sedes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="location-card group">
                    <div class="location-image-container h-72">
                        <img alt="Sede Central" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd2_H08jilsWIyRClEVK8eRTHnJGc3jQKquVDiSoNGEmoEB0C6UCpS7WeA8aDPrO52EOkPAKHDWRSSDC-CvWlIn_NF_xhC7D77LVrpgHAWwwZUYdgrD9MNYUhAJPn7H1g40rCQNKpMSsI8w1pnFQnDuHRLeFLZ5JWnmxFqjoby8WiAddfI1QE-0yVUXwJn1BOTldsaWXw3NK5bk6E1Nd9-wP0qxr1pTSn0WZul-HeY6eu5E7RZpploWOPfTa6-5N3ra-k2AbbdoYI"/>
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Central</h3>
                            <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">CDMX</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">Av. Universidad 1234, Col. Centro.</p>
                        <a href="#" class="block w-full py-4 rounded-xl border border-gray-200 dark:border-gray-700 text-center font-bold text-gray-700 dark:text-white hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-black transition-colors">
                            Ver mapa
                        </a>
                    </div>
                </div>
                <div class="location-card group">
                    <div class="location-image-container h-72">
                        <img alt="Sede Norte" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiapKTJC8xcc7tkIfBrgC_FyqQlJ9OJ2UKNO07Zn7DYyoBJF-WSsgB3AJ_Qhuv7-n7N4D4xk7E2__eeQkdC-7ITFPyjGPBCmN8uiFtl4rnFbeT7t4ioAKfwjUFfFDDgijzBfMFgvVpiWS-EHiaKdNeGqoWFXOVphvMsFx1MQu2nNeoG_hJDWRV9YXisLjkhE7v3j69MJquAhDtDOEppbV4pOiJjzhINDrhZ36WrXQ0YL0a2VTepauikYBVK6jYxgyx55XuPnwaVZs"/>
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Norte</h3>
                            <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">Monterrey</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">Calle del Sol 567, Plaza Norte.</p>
                        <a href="#" class="block w-full py-4 rounded-xl border border-gray-200 dark:border-gray-700 text-center font-bold text-gray-700 dark:text-white hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-black transition-colors">
                            Ver mapa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SCRIPTS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /* --- 1. MÁQUINA DE ESCRIBIR --- */
            const textElement = document.getElementById('typewriter-text');
            const phrases = [
                "Beca Tecsup",
                "Beca Cayetano Heredia",
                "Beca Ferreyros",
                "Beca BCP",
                "Beca Uni",
                "Beca San Marcos"
            ];
            let phraseIndex = 0;
            let charIndex = 0;
            let isDeleting = false;

            function type() {
                const currentPhrase = phrases[phraseIndex];
                if (isDeleting) {
                    textElement.textContent = currentPhrase.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    textElement.textContent = currentPhrase.substring(0, charIndex + 1);
                    charIndex++;
                }

                if (!isDeleting && charIndex === currentPhrase.length) {
                    isDeleting = true;
                    setTimeout(type, 2000); // Pausa al completar palabra
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    setTimeout(type, 500);
                } else {
                    setTimeout(type, isDeleting ? 50 : 100);
                }
            }
            if(textElement) type();

            /* --- 2. ANIMACIONES AL SCROLL --- */
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        requestAnimationFrame(() => entry.target.classList.add('active'));
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });
            document.querySelectorAll('.reveal-left, .reveal-right').forEach(el => observer.observe(el));

            /* --- 3. ROTACIÓN MUNICIPALIDADES --- */
            const muniContainer = document.querySelector('[data-municipios-grid]');
            if (muniContainer) {
                let isPaused = false;
                muniContainer.addEventListener('mouseenter', () => isPaused = true);
                muniContainer.addEventListener('mouseleave', () => isPaused = false);
                setInterval(() => {
                    if (!isPaused && muniContainer.lastElementChild) {
                        muniContainer.insertBefore(muniContainer.lastElementChild, muniContainer.firstElementChild);
                    }
                }, 3500);
            }
        });
    </script>
@endsection