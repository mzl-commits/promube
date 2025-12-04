@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
    <style>
        /* =========================================
           0. CONFIGURACIÓN BASE (#EF233C)
           ========================================= */
        :root {
            --brand-red: #ef233c; 
            --brand-red-hover: #d11a30; 
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
        }

        /* FORZAR EL COLOR EN EL LAYOUT GLOBAL */
        .bg-primary { background-color: var(--brand-red) !important; }
        .text-primary { color: var(--brand-red) !important; }
        .border-primary { border-color: var(--brand-red) !important; }
        
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* =========================================
           1. HERO (ATMÓSFERA ROJA)
           ========================================= */
        .hero-wrapper {
            position: relative;
            width: 100vw; height: 100vh;
            margin-left: calc(-50vw + 50%);
            overflow: hidden;
            display: flex; align-items: center; justify-content: center;
            background-color: var(--brand-red);
        }
        .hero-bg-css {
            position: absolute; inset: 0; z-index: 0;
            background: linear-gradient(135deg, #ff4d63 0%, #ef233c 50%, #d61c32 100%);
            background-size: 200% 200%;
            animation: gradientMove 10s ease infinite alternate;
        }
        .hero-pattern {
            position: absolute; inset: 0; z-index: 1;
            background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 30px 30px; opacity: 0.4;
        }
        .hero-content {
            position: relative; z-index: 10; text-align: center;
            max-width: 1200px; padding: 0 2rem;
            display: flex; flex-direction: column; align-items: center; gap: 1.5rem;
        }
        .hero-title {
            font-size: clamp(3rem, 7vw + 1rem, 7rem);
            line-height: 0.95; font-weight: 900; color: #ffffff;
            text-shadow: 0 4px 30px rgba(200, 20, 40, 0.4); margin-bottom: 0.5rem; letter-spacing: -0.03em;
        }
        .hero-subtitle {
            font-size: clamp(1.2rem, 2vw, 1.8rem);
            color: rgba(255, 255, 255, 0.95); font-weight: 400; max-width: 800px; margin-bottom: 2rem;
        }
        .typewriter-box {
            display: inline-flex; align-items: center;
            background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.8rem 2.5rem; border-radius: 99px; backdrop-filter: blur(8px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .typewriter-label {
            color: rgba(255, 255, 255, 0.9); font-weight: 600; margin-right: 1rem;
            text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;
        }
        .typewriter-text {
            font-family: 'Courier New', monospace; font-size: clamp(1.1rem, 2vw, 1.5rem);
            font-weight: 700; color: #ffffff; text-shadow: 0 0 10px rgba(255,255,255,0.6);
        }
        .cursor {
            width: 3px; height: 1.4em; background: #ffffff; margin-left: 8px;
            animation: blink 1s step-end infinite;
        }
        .scroll-indicator {
            position: absolute; bottom: 40px; left: 50%; transform: translateX(-50%);
            color: rgba(255,255,255,0.7); animation: bounce 2s infinite; z-index: 20;
            transition: color 0.3s;
        }
        .scroll-indicator:hover { color: white; }
        @keyframes gradientMove { 0% { background-position: 0% 50%; } 100% { background-position: 100% 50%; } }
        @keyframes blink { 50% { opacity: 0; } }
        @keyframes bounce { 0%, 20%, 50%, 80%, 100% {transform:translate(-50%,0);} 40% {transform:translate(-50%,-10px);} 60% {transform:translate(-50%,-5px);} }

        /* =========================================
           2. ESTILOS TARJETAS (ADAPTADOS AL ROJO)
           ========================================= */
        /* Estilos 3D para Becas */
        .perspective-container { perspective: 2500px; overflow-x: hidden; padding: 2rem 0; }
        .card-3d-wrapper { transition: transform 0.6s var(--ease-out-expo); }
        .group:hover .card-3d-wrapper { transform: scale(1.02) translateY(-10px); }
        
        /* Animaciones de entrada lateral */
        .reveal-left, .reveal-right { opacity: 0; transition: all 1.2s var(--ease-out-expo); will-change: transform, opacity; }
        .reveal-left { transform: translateX(-80px) rotateY(-10deg) scale(0.95); transform-origin: left center; }
        .reveal-right { transform: translateX(80px) rotateY(10deg) scale(0.95); transform-origin: right center; }
        .reveal-left.active, .reveal-right.active { opacity: 1; transform: translateX(0) rotateY(0) scale(1); }

        /* Estilos Generales Tarjetas */
        .partner-card, .student-profile, .location-card, .beca-slide-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid rgba(239, 35, 60, 0.08);
            transition: all 0.4s var(--ease-out-expo);
            overflow: hidden;
        }
        .dark .partner-card, .dark .student-profile, .dark .location-card, .dark .beca-slide-card {
            background: #151515; border-color: rgba(255,255,255,0.05);
        }
        .partner-card:hover, .student-profile:hover, .location-card:hover, .beca-slide-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(239, 35, 60, 0.15);
            border-color: rgba(239, 35, 60, 0.3);
        }

        /* Partner Card */
        .partner-card { padding: 3rem 2rem; display: flex; flex-direction: column; align-items: center; height: 100%; }
        .partner-logo-wrapper { width: 6rem; height: 6rem; margin-bottom: 2rem; display: flex; align-items: center; justify-content: center; filter: grayscale(100%) opacity(0.7); transition: 0.5s ease; }
        .partner-card:hover .partner-logo-wrapper { filter: grayscale(0%) opacity(1); transform: scale(1.1); }
        .partner-name { font-size: 1.35rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem; transition: color 0.3s; }
        .dark .partner-name { color: #f1f5f9; }
        .partner-card:hover .partner-name { color: var(--brand-red); }
        .partner-description { font-size: 0.95rem; color: #64748b; text-align: center; line-height: 1.7; font-weight: 400; }
        .dark .partner-description { color: #94a3b8; }

        /* Otros */
        .location-card { display: flex; flex-direction: column; height: 100%; }
        .location-image-container { height: 16rem; overflow: hidden; position: relative; }
        .location-card img, .beca-slide-card img { transition: 0.7s ease; width: 100%; height: 100%; object-fit: cover; }
        .location-card:hover img, .beca-slide-card:hover img { transform: scale(1.08); }
        .carousel-dot { width: 10px; height: 10px; border-radius: 50%; background-color: #e5e7eb; transition: 0.3s ease; cursor: pointer; }
        .dark .carousel-dot { background-color: #333; }
        .carousel-dot.active { background-color: var(--brand-red); transform: scale(1.3); }
    </style>

    {{-- 1. HERO FULL SCREEN (RED) --}}
    <div class="hero-wrapper">
        <div class="hero-bg-css"></div>
        <div class="hero-pattern"></div>
        <div class="hero-content animate-fade-in-up">
            <h1 class="hero-title">PROMUBE</h1>
            <p class="hero-subtitle">
                Promoción de Becas y Programas Educativos.<br>
                El futuro está en tus manos.
            </p>
            <div class="typewriter-box">
                <span class="typewriter-label">CONVOCATORIAS:</span>
                <span id="typewriter-text" class="typewriter-text"></span>
                <span class="cursor"></span>
            </div>
        </div>
        <a href="#becas" class="scroll-indicator"><span class="material-symbols-outlined text-5xl">keyboard_arrow_down</span></a>
    </div>

    {{-- 2. BECAS DESTACADAS (GRID 3D ALTERNADO) --}}
    {{-- ¡AQUÍ ESTÁ EL CAMBIO! Restaurado el diseño de cuadrícula alternada --}}
    <section id="becas" class="py-24 perspective-container bg-white dark:bg-[#0a0a0a] overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-24">
                <span class="font-bold tracking-widest uppercase text-xs mb-3 block" style="color: var(--brand-red);">Oportunidades Premium</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white">Becas Destacadas</h2>
            </div>

            @php
                $imagenes = [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAqsDW7Eyzl38NxtWzXWj9ZPNb9fnfDkRhiSR5ugftDifvRlgtJRrJgnObPxcDYoKv0hx6cghdStc9Rr8w-H_A5ixsXT1LSeMWXrD727ymKaPh_kk7h-Ul2txlr3zTIgf806_eYucfUe1WRUPIxzgoca2dwJHdAgu9x0gwM-QgJtuydonoDwuv31yLaQ5D5fpDyKZdATqfnn6BK_1dOlv3YKPsKjv_pCf62uLtgJibEcgS32AoV8eOVKyXEaq1D6g3znWc1vivIYjw',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuB6zVY2V16CGVuc4WNtxW-GpEd3MpEU1wyTOHuWQqEgHLzwbqf05yKK3k2nBdug7uncLU64WSj5tlCmtB_4zAa0TiOYhNJWNkamFFRtRtOPugWEwkMV5iWP9FcOPeoA1je-V16kb-LWsntI2zf-P0JW3iViyI23Qj_9_uLkihF-bJ6LRzwkg-ocWfZzwb0uaCBhESle3HTNAlj4yMaN_PVDw0V8m09VsLeocoJyw-DJqyy8w0FgdKOda0MhoY0rOYbNfRIB3iojjyE'
                ];
            @endphp

            <div class="space-y-40"> 
                @forelse($becasDestacadas as $index => $beca)
                    @php $imgSrc = $imagenes[$index % count($imagenes)]; @endphp

                    {{-- GRID ALTERNADO --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24 items-center group">
                        
                        {{-- Lado Imagen (con efecto 3D) --}}
                        <div class="relative card-3d-wrapper {{ $loop->even ? 'md:order-2 reveal-right' : 'reveal-left' }}">
                            <img alt="{{ $beca->titulo }}" class="rounded-3xl shadow-2xl w-full h-auto object-cover aspect-[4/3]" src="{{ $imgSrc }}"/>
                            {{-- Badge --}}
                            <div class="absolute top-6 left-6">
                                <span class="text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg uppercase tracking-wide" style="background-color: var(--brand-red);">
                                    {{ $beca->tipo ?? 'Beca' }}
                                </span>
                            </div>
                        </div>
                        
                        {{-- Lado Texto --}}
                        <div class="{{ $loop->even ? 'md:order-1 reveal-left' : 'reveal-right' }}">
                            <h3 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900 dark:text-white leading-tight">
                                {{ $beca->titulo }}
                            </h3>
                            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
                                {{ $beca->resumen ?? Str::limit($beca->descripcion, 180) }}
                            </p>
                            <a href="{{ route('becas.show', $beca->id) }}" class="inline-flex items-center text-lg font-bold hover:opacity-80 transition-opacity group/link" style="color: var(--brand-red);">
                                <span class="border-b-2 pb-1" style="border-color: var(--brand-red);">Ver detalles completos</span>
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

            <div class="mt-32 text-center">
                <a href="{{ route('becas.index') }}" class="inline-flex items-center justify-center px-10 py-4 text-lg font-bold text-white transition-all rounded-full hover:shadow-lg hover:shadow-red-500/20 hover:opacity-90" style="background-color: var(--brand-red);">
                    Explorar Catálogo Completo
                </a>
            </div>
        </div>
    </section>

    {{-- 3. MUNICIPALIDADES --}}
    <section class="py-24 bg-gray-50 dark:bg-[#0f0f0f]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                 <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">Aliados Estratégicos</h2>
                 <p class="text-gray-500 text-lg">Colaboramos con los gobiernos locales para tu desarrollo.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                @foreach(['Centro', 'Norte', 'Sur', 'Occidente'] as $index => $muni)
                <div class="partner-card group">
                    <div class="partner-logo-wrapper">
                        <img alt="Escudo {{ $muni }}" class="partner-logo" src="http://googleusercontent.com/profile/picture/{{ 8 + $index }}"/>
                    </div>
                    <h3 class="partner-name text-center">Muni. {{ $muni }}</h3>
                    <p class="partner-description">
                        Gracias a la alianza estratégica con la Municipalidad de {{ $muni }}, hemos logrado beneficiar a más de 500 estudiantes este año. Juntos trabajamos para reducir la deserción escolar.
                    </p>
                    <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300" style="background-color: var(--brand-red);"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. ALUMNOS (CARRUSEL) --}}
    <section class="py-24 bg-white dark:bg-black relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-center mb-20 text-gray-900 dark:text-white">Historias Reales</h2>
            
            <div class="relative group">
                <div id="students-slider" 
                     class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar pb-10 px-4"
                     style="-webkit-overflow-scrolling: touch;">
                    
                    @forelse($beneficiados as $beneficiado)
                        <div class="snap-center shrink-0 w-full md:w-[calc(50%-16px)] flex">
                            <div class="student-slide w-full">
                                <div class="student-profile p-8 flex flex-col sm:flex-row items-start space-y-6 sm:space-y-0 sm:space-x-6 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors h-full">
                                    <img alt="{{ $beneficiado->nombre }}" class="w-24 h-24 rounded-full object-cover border-2 flex-shrink-0" style="border-color: var(--brand-red);" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"/>
                                    <div>
                                        <h4 class="font-bold text-xl text-gray-900 dark:text-white">{{ $beneficiado->nombre }}</h4>
                                        <p class="text-xs font-bold uppercase tracking-wide mb-3" style="color: var(--brand-red);">Becario {{ date('Y') }}</p>
                                        <p class="text-gray-600 dark:text-gray-400 italic text-base">"{{ $beneficiado->testimonio ?? 'Experiencia increíble.' }}"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        @foreach([1, 2, 3, 4] as $i)
                        <div class="snap-center shrink-0 w-full md:w-[calc(50%-16px)] flex">
                            <div class="student-slide w-full">
                                <div class="student-profile p-8 flex items-start space-x-6">
                                    <img class="w-24 h-24 rounded-full border-2" style="border-color: var(--brand-red);" src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg" alt="Juan">
                                    <div><h4 class="font-bold text-xl dark:text-white">Estudiante Ejemplar {{ $i }}</h4><p class="text-gray-600 dark:text-gray-400 italic">"Gracias a PROMUBE pude estudiar mi carrera soñada."</p></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforelse
                </div>
            </div>

            <div class="flex justify-center items-center gap-3 mt-6" id="student-dots"></div>
        </div>
    </section>

    {{-- 5. SEDES --}}
    <section class="py-24 bg-gray-50 dark:bg-[#0a0a0a]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-gray-800 dark:text-white">Nuestras Sedes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="location-card group">
                    <div class="location-image-container">
                        <img class="h-full w-full object-cover" alt="Sede Central" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd2_H08jilsWIyRClEVK8eRTHnJGc3jQKquVDiSoNGEmoEB0C6UCpS7WeA8aDPrO52EOkPAKHDWRSSDC-CvWlIn_NF_xhC7D77LVrpgHAWwwZUYdgrD9MNYUhAJPn7H1g40rCQNKpMSsI8w1pnFQnDuHRLeFLZ5JWnmxFqjoby8WiAddfI1QE-0yVUXwJn1BOTldsaWXw3NK5bk6E1Nd9-wP0qxr1pTSn0WZul-HeY6eu5E7RZpploWOPfTa6-5N3ra-k2AbbdoYI"/>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full" style="color: var(--brand-red);">CDMX</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Sede Central</h3>
                        <p class="text-gray-500 mb-2">Av. Universidad 1234, Col. Centro.</p>
                        <div class="flex items-center gap-2 text-sm text-gray-400 mb-6"><span class="material-symbols-outlined text-lg">schedule</span><span>Horario: Lun-Vie, 9am - 6pm</span></div>
                        <a href="{{ route('sedes.index') }}#central" class="mt-auto block w-full py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-center font-bold hover:text-white transition-colors" onmouseover="this.style.backgroundColor=var(--brand-red)" onmouseout="this.style.backgroundColor=''">Ver mapa</a>
                    </div>
                </div>

                <div class="location-card group">
                    <div class="location-image-container">
                        <img class="h-full w-full object-cover" alt="Sede Norte" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiapKTJC8xcc7tkIfBrgC_FyqQlJ9OJ2UKNO07Zn7DYyoBJF-WSsgB3AJ_Qhuv7-n7N4D4xk7E2__eeQkdC-7ITFPyjGPBCmN8uiFtl4rnFbeT7t4ioAKfwjUFfFDDgijzBfMFgvVpiWS-EHiaKdNeGqoWFXOVphvMsFx1MQu2nNeoG_hJDWRV9YXisLjkhE7v3j69MJquAhDtDOEppbV4pOiJjzhINDrhZ36WrXQ0YL0a2VTepauikYBVK6jYxgyx55XuPnwaVZs"/>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full" style="color: var(--brand-red);">Monterrey</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Sede Norte</h3>
                        <p class="text-gray-500 mb-2">Calle del Sol 567, Plaza Norte.</p>
                        <div class="flex items-center gap-2 text-sm text-gray-400 mb-6"><span class="material-symbols-outlined text-lg">schedule</span><span>Horario: Lun-Vie, 10am - 5pm</span></div>
                        <a href="{{ route('sedes.index') }}#norte" class="mt-auto block w-full py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-center font-bold hover:text-white transition-colors" onmouseover="this.style.backgroundColor=var(--brand-red)" onmouseout="this.style.backgroundColor=''">Ver mapa</a>
                    </div>
                </div>

                <div class="location-card group">
                    <div class="location-image-container">
                        <img class="h-full w-full object-cover" alt="Sede Sur" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBg8PymSKI3WqL0j_KJBDo7DgRCwApkez7oMNJ-4DXE0870OQlrDSnJ-oTFCXGT0cnbmhkHAvtgHlfVMfssGaBLKqpobcgKNNh2Z0IwiYk1J9D29_csvV7aoFllZJgqD3ipRx806mX4LLAbRP_YeMqYp03QIlHvUHfh5thXRHFcUb8VfuqVurY6dlSoOnolpLWFcgBCFLvniImMuDxAGPw4-g4W3bgYF4T3GYlhKK3tyw9LHGi5sIYKOKViLgZbIJzYKCY-3hbzraQ"/>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full" style="color: var(--brand-red);">Guadalajara</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Sede Sur</h3>
                        <p class="text-gray-500 mb-2">Av. Vallarta 999, Zona Minerva.</p>
                        <div class="flex items-center gap-2 text-sm text-gray-400 mb-6"><span class="material-symbols-outlined text-lg">schedule</span><span>Horario: Lun-Vie, 9am - 6pm</span></div>
                        <a href="{{ route('sedes.index') }}#sur" class="mt-auto block w-full py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-center font-bold hover:text-white transition-colors" onmouseover="this.style.backgroundColor=var(--brand-red)" onmouseout="this.style.backgroundColor=''">Ver mapa</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /* 1. TYPEWRITER */
            const textElement = document.getElementById('typewriter-text');
            const phrases = ["Beca Tecsup", "Beca Cayetano Heredia", "Beca Ferreyros", "Beca BCP", "Beca Uni", "Beca San Marcos"];
            let phraseIndex = 0; let charIndex = 0; let isDeleting = false;
            function type() {
                const currentPhrase = phrases[phraseIndex];
                if (isDeleting) { textElement.textContent = currentPhrase.substring(0, charIndex - 1); charIndex--; }
                else { textElement.textContent = currentPhrase.substring(0, charIndex + 1); charIndex++; }
                if (!isDeleting && charIndex === currentPhrase.length) { isDeleting = true; setTimeout(type, 2000); }
                else if (isDeleting && charIndex === 0) { isDeleting = false; phraseIndex = (phraseIndex + 1) % phrases.length; setTimeout(type, 500); }
                else { setTimeout(type, isDeleting ? 50 : 100); }
            }
            if(textElement) type();

            /* 2. CARRUSEL ALUMNOS */
            const slider = document.getElementById('students-slider');
            const dotsContainer = document.getElementById('student-dots');
            if (slider && dotsContainer) {
                const updateDots = () => {
                    dotsContainer.innerHTML = '';
                    const containerWidth = slider.clientWidth;
                    const scrollWidth = slider.scrollWidth;
                    if (scrollWidth <= containerWidth + 10) return;
                    const pages = Math.round(scrollWidth / containerWidth); 
                    for (let i = 0; i < pages; i++) {
                        const dot = document.createElement('div');
                        dot.classList.add('carousel-dot');
                        if (i === 0) dot.classList.add('active');
                        dot.addEventListener('click', () => { slider.scrollTo({ left: i * containerWidth, behavior: 'smooth' }); });
                        dotsContainer.appendChild(dot);
                    }
                };
                slider.addEventListener('scroll', () => {
                    const containerWidth = slider.clientWidth;
                    const scrollLeft = slider.scrollLeft;
                    const activeIndex = Math.round(scrollLeft / containerWidth);
                    const dots = dotsContainer.children;
                    for (let i = 0; i < dots.length; i++) {
                        if (i === activeIndex) dots[i].classList.add('active'); else dots[i].classList.remove('active');
                    }
                });
                updateDots();
                window.addEventListener('resize', updateDots);
            }

            /* 3. ANIMACIONES SCROLL */
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) { entry.target.classList.add('active'); observer.unobserve(entry.target); }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal-left, .reveal-right').forEach(el => observer.observe(el));
        });
    </script>
@endsection