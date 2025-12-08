@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
    <style>
        /* =========================================
               CONFIGURACIÓN BASE (#EF233C)
            ========================================= */
        :root {
            --brand-red: #ef233c;
            --brand-red-light: rgba(239, 35, 60, 0.08);
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
        }

        /* OVERRIDES GLOBALES */
        .bg-primary {
            background-color: var(--brand-red) !important;
        }

        .text-primary {
            color: var(--brand-red) !important;
        }

        .border-primary {
            border-color: var(--brand-red) !important;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* =========================================
               1. HERO (SPLIT LAYOUT + ALTURA AJUSTADA)
            ========================================= */
        .hero-wrapper {
            position: relative;
            width: 100%;
            height: calc(100vh - 6rem);
            min-height: 600px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--brand-red);
        }

        .hero-bg-css {
            position: absolute;
            inset: 0;
            z-index: 0;
            background: linear-gradient(135deg, #ff4d63 0%, #ef233c 50%, #d61c32 100%);
            background-size: 200% 200%;
            animation: gradientMove 10s ease infinite alternate;
        }

        .hero-pattern {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.4;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1200px;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 2rem;
        }

        .hero-text-col {
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .hero-title {
            font-size: clamp(3.5rem, 6vw + 1rem, 7.5rem);
            line-height: 0.9;
            font-weight: 900;
            color: #ffffff;
            text-shadow: 0 4px 30px rgba(180, 20, 30, 0.4);
            margin-bottom: 1.5rem;
            letter-spacing: -0.04em;
        }

        .hero-subtitle {
            font-size: clamp(1.2rem, 1.5vw, 1.5rem);
            color: rgba(255, 255, 255, 0.95);
            font-weight: 400;
            max-width: 600px;
            margin-bottom: 2.5rem;
            line-height: 1.4;
        }

        .hero-visual-col {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-main-icon {
            font-size: clamp(15rem, 25vw, 30rem);
            color: rgba(255, 255, 255, 0.15);
            filter: drop-shadow(0 10px 40px rgba(0, 0, 0, 0.1));
            animation: floatingLogo 6s ease-in-out infinite;
            transform: rotate(-10deg);
        }

        .typewriter-box {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.8rem 2rem;
            border-radius: 12px;
            backdrop-filter: blur(8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .typewriter-label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            margin-right: 1rem;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.1em;
        }

        .typewriter-text {
            font-family: 'Courier New', monospace;
            font-size: clamp(1.1rem, 2vw, 1.4rem);
            font-weight: 700;
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }

        .cursor {
            width: 3px;
            height: 1.4em;
            background: #ffffff;
            margin-left: 8px;
            animation: blink 1s step-end infinite;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(255, 255, 255, 0.7);
            animation: bounce 2s infinite;
            z-index: 20;
            transition: color 0.3s;
        }

        .scroll-indicator:hover {
            color: #ffffff;
        }

        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .hero-text-col {
                align-items: center;
            }

            .hero-visual-col {
                order: -1;
            }

            .hero-main-icon {
                font-size: 12rem;
                margin-bottom: -2rem;
                opacity: 0.3;
            }
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        @keyframes floatingLogo {

            0%,
            100% {
                transform: translateY(0) rotate(-5deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translate(-50%, 0);
            }

            40% {
                transform: translate(-50%, -10px);
            }

            60% {
                transform: translate(-50%, -5px);
            }
        }

        /* =========================================
               2. ESTILOS TARJETAS GENERALES
            ========================================= */
        .partner-card,
        .student-profile,
        .location-card,
        .beca-slide-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid rgba(239, 35, 60, 0.08);
            transition: all 0.4s var(--ease-out-expo);
            overflow: hidden;
            position: relative;
        }

        .dark .partner-card,
        .dark .student-profile,
        .dark .location-card,
        .dark .beca-slide-card {
            background: #151515;
            border-color: rgba(255, 255, 255, 0.05);
        }

        .partner-card:hover,
        .student-profile:hover,
        .location-card:hover,
        .beca-slide-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(239, 35, 60, 0.15);
            border-color: rgba(239, 35, 60, 0.3);
        }

        .partner-card {
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }

        .partner-logo-wrapper {
            width: 6rem;
            height: 6rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            filter: grayscale(100%) opacity(0.7);
            transition: 0.5s ease;
        }

        .partner-card:hover .partner-logo-wrapper {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.1);
        }

        .partner-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 1rem;
            transition: color 0.3s;
        }

        .dark .partner-name {
            color: #f1f5f9;
        }

        .partner-card:hover .partner-name {
            color: var(--brand-red);
        }

        .partner-description {
            font-size: 0.95rem;
            color: #64748b;
            text-align: center;
            line-height: 1.7;
            font-weight: 400;
        }

        .dark .partner-description {
            color: #94a3b8;
        }

        .location-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .location-image-container {
            height: 16rem;
            overflow: hidden;
            position: relative;
        }

        .location-card img,
        .beca-slide-card img {
            transition: 0.7s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .location-card:hover img,
        .beca-slide-card:hover img {
            transform: scale(1.08);
        }

        .sede-icon {
            width: 3.5rem;
            height: 3.5rem;
            background-color: var(--brand-red-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-red);
            transition: all 0.3s ease;
        }

        .location-card:hover .sede-icon {
            background-color: var(--brand-red);
            color: white;
            transform: scale(1.1);
        }

        .student-slide {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .student-profile {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .carousel-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #e5e7eb;
            transition: 0.3s ease;
            cursor: pointer;
        }

        .dark .carousel-dot {
            background-color: #333;
        }

        .carousel-dot.active {
            background-color: var(--brand-red);
            transform: scale(1.3);
            box-shadow: 0 0 10px rgba(239, 35, 60, 0.4);
        }

        /* =========================================
               3. MOSAICO DE BECAS (EFECTO UPC)
            ========================================= */
        .becas-header {
            text-align: center;
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .becas-title {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 900;
            color: #6e0c0c;
        }

        .becas-mosaic-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            grid-auto-rows: 30vh;
            gap: 1.5rem;
            padding: 0 1.5rem;
        }

        .beca-mosaic-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            background: #000;
            cursor: pointer;
        }

        .beca-mosaic-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .beca-mosaic-overlay {
            position: absolute;
            inset: 0;
            background: transparent;
            transition: background 0.3s ease;
            z-index: 0;
        }

        .beca-mosaic-body {
            position: absolute;
            inset-inline: 0;
            bottom: 0;
            padding: 1.4rem 1.8rem;
            color: #fff;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .beca-mosaic-body--center {
            top: 50%;
            bottom: auto;
            transform: translateY(-50%);
        }

        .beca-mosaic-tag {
            display: inline-block;
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
            background: #ffffff;
            color: var(--brand-red);
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* 👉 SOLO SE VE EL TAG POR DEFECTO.
                  EL TEXTO LARGO APARECE EN HOVER */
        .beca-mosaic-title {
            margin-top: 0.6rem;
            font-size: 0.95rem;
            font-weight: 800;
            line-height: 1.2;
            max-width: 24rem;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transform: translateY(4px);
            transition:
                opacity 0.3s ease,
                transform 0.3s ease,
                max-height 0.3s ease;
        }

        .beca-mosaic-card:hover .beca-mosaic-title {
            max-height: 4.5rem;
            /* espacio para 2–3 líneas */
            opacity: 1;
            transform: translateY(0);
        }

        /* Tarjeta central ocupa 2 filas */
        .beca-mosaic-card--center {
            grid-row: span 2;
        }

        /* Hover rojo + zoom imagen */
        .beca-mosaic-card:hover .beca-mosaic-img {
            transform: scale(1.05);
        }

        .beca-mosaic-card:hover .beca-mosaic-overlay {
            background: rgba(239, 35, 60, 0.9);
        }

        @media (max-width: 1024px) {
            .becas-mosaic-grid {
                grid-template-columns: 1fr 1fr;
                grid-auto-rows: 40vh;
            }

            .beca-mosaic-card--center {
                grid-row: span 1;
            }
        }

        @media (max-width: 640px) {
            .becas-mosaic-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: 36vh;
            }
        }
    </style>

    {{-- 1. HERO --}}
    <div class="hero-wrapper">
        <div class="hero-bg-css"></div>
        <div class="hero-pattern"></div>

        <div class="hero-content animate-fade-in-up">
            {{-- Columna Izquierda --}}
            <div class="hero-text-col">
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

            {{-- Columna Derecha --}}
            <div class="hero-visual-col">
                <span class="material-symbols-outlined hero-main-icon">school</span>
            </div>
        </div>

        <a href="#becas" class="scroll-indicator">
            <span class="material-symbols-outlined text-5xl">keyboard_arrow_down</span>
        </a>
    </div>

    {{-- 2. BECAS DESTACADAS – MOSAICO --}}
    <section id="becas" class="py-2 bg-white dark:bg-[#0a0a0a] overflow-hidden">
        <div class="mx-auto px-0 becas-mosaic-container">
            {{-- Título sección --}}
            <div class="becas-header px-6">
                <h2 class="becas-title">Becas destacadas</h2>
            </div>

            {{-- MOSAICO --}}
            <div class="becas-mosaic-grid">
                {{-- 1. Izquierda – arriba --}}
                <article class="beca-mosaic-card beca-mosaic-card--left-top"
                    onclick="window.location='{{ route('becas.bcp') }}'">
                    <img src="{{ asset('img/becas/beca-bcp.png') }}" alt="Beca BCP" class="beca-mosaic-img">
                    <div class="beca-mosaic-overlay"></div>
                    <div class="beca-mosaic-body">
                        <span class="beca-mosaic-tag">BECA BCP</span>
                        <h3 class="beca-mosaic-title">
                            EPGXpert Talks: beca para líderes que quieren conectar con expertos
                        </h3>
                    </div>
                </article>

                {{-- 2. Centro – alta --}}
                <article class="beca-mosaic-card beca-mosaic-card--center">
                    <img src="{{ asset('img/becas/beca-18.png') }}" alt="Beca 18" class="beca-mosaic-img">
                    <div class="beca-mosaic-overlay"></div>
                    <div class="beca-mosaic-body beca-mosaic-body--center">
                        <span class="beca-mosaic-tag">BECA 18</span>
                        <h3 class="beca-mosaic-title">
                            Beca excelencia académica en instituciones líderes del país
                        </h3>
                    </div>
                </article>

                {{-- 3. Derecha – arriba --}}
                <article class="beca-mosaic-card beca-mosaic-card--right-top">
                    <img src="{{ asset('img/becas/beca-tecsup.png') }}" alt="Beca Tecsup" class="beca-mosaic-img">
                    <div class="beca-mosaic-overlay"></div>
                    <div class="beca-mosaic-body">
                        <span class="beca-mosaic-tag">BECA TECSUP</span>
                        <h3 class="beca-mosaic-title">
                            Beca excelencia académica en instituciones líderes del país
                        </h3>
                    </div>
                </article>

                {{-- 4. Izquierda – abajo --}}
                <article class="beca-mosaic-card beca-mosaic-card--left-bottom">
                    <img src="{{ asset('img/Beca-Ferreyros.png') }}" alt="Beca Ferreyros" class="beca-mosaic-img">
                    <div class="beca-mosaic-overlay"></div>
                    <div class="beca-mosaic-body">
                        <span class="beca-mosaic-tag">BECA FERREYROS</span>
                        <h3 class="beca-mosaic-title">
                            Becas para diplomados y especializaciones en alianza con universidades
                        </h3>
                    </div>
                </article>

                {{-- 5. Derecha – abajo --}}
                <article class="beca-mosaic-card beca-mosaic-card--right-bottom">
                    <img src="{{ asset('img/becas/beca-uni.png') }}" alt="Beca UNI" class="beca-mosaic-img">
                    <div class="beca-mosaic-overlay"></div>
                    <div class="beca-mosaic-body">
                        <span class="beca-mosaic-tag">BECA UNI</span>
                        <h3 class="beca-mosaic-title">
                            Beca integral que cubre estudios y participación en actividades estudiantiles
                        </h3>
                    </div>
                </article>
            </div>
        </div>

        {{-- BOTÓN VER MÁS --}}
        <div class="mt-12 text-center">
            <a href="{{ route('becas.index') }}" class="inline-flex items-center justify-center px-10 py-3 text-sm md:text-base font-bold rounded-full
                          text-white hover:opacity-90 transition-all"
                style="background-color: var(--brand-red); box-shadow: 0 10px 30px rgba(239,35,60,0.25);">
                Ver más
            </a>
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
                {{-- MUNI. CAIRANI --}}
                <div class="partner-card group">
                    <div class="partner-logo-wrapper">
                        <img alt="Escudo Cairani" class="partner-logo"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Coat_of_Arms_of_Cairani.png/200px-Coat_of_Arms_of_Cairani.png">
                    </div>
                    <h3 class="partner-name text-center">Muni. Cairani</h3>
                    <p class="partner-description text-center text-sm">
                        <strong>Alcalde (2023-2026):</strong> Tito Mamani Mamani <br><br>
                        Gracias a la cooperación con la Municipalidad de Cairani, seguimos construyendo
                        un distrito más próspero, potenciando nuestra riqueza agrícola e hídrica en el corazón
                        de la provincia de Candarave.
                    </p>
                    <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0
                                    group-hover:scale-x-100 transition-transform duration-300"
                        style="background-color: var(--brand-red);"></div>
                </div>

                {{-- MUNI. CHOCO --}}
                <div class="partner-card group">
                    <div class="partner-logo-wrapper">
                        <img alt="Escudo Choco" class="partner-logo"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Coat_of_Arms_of_Choco.png/200px-Coat_of_Arms_of_Choco.png">
                    </div>
                    <h3 class="partner-name text-center">Muni. Choco</h3>
                    <p class="partner-description text-center text-sm">
                        <strong>Alcaldesa (2023-2026):</strong> Eva Elizabeth Chura Quicaña <br><br>
                        Junto a la Municipalidad de Choco, trabajamos por el progreso de nuestro distrito
                        enclavado en la cordillera, mejorando la calidad de vida y las oportunidades para
                        nuestras familias agricultoras y ganaderas.
                    </p>
                    <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0
                                    group-hover:scale-x-100 transition-transform duration-300"
                        style="background-color: var(--brand-red);"></div>
                </div>

                {{-- MUNI. SAMA --}}
                <div class="partner-card group">
                    <div class="partner-logo-wrapper">
                        <img alt="Escudo Sama" class="partner-logo"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Coat_of_Arms_of_Sama.png/200px-Coat_of_Arms_of_Sama.png">
                    </div>
                    <h3 class="partner-name text-center">Muni. Sama</h3>
                    <p class="partner-description text-center text-sm">
                        <strong>Alcalde (2023-2026):</strong> Richard Santos Calizaya Pimentel <br><br>
                        En alianza estratégica con la Municipalidad de Sama, impulsamos el crecimiento de
                        nuestro valle, apoyando la agricultura, el turismo en nuestras playas y la revalorización
                        de nuestra historia local.
                    </p>
                    <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0
                                    group-hover:scale-x-100 transition-transform duration-300"
                        style="background-color: var(--brand-red);"></div>
                </div>

                {{-- MUNI. PALCA --}}
                <div class="partner-card group">
                    <div class="partner-logo-wrapper">
                        <img alt="Escudo Palca" class="partner-logo"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Coat_of_Arms_of_Palca.png/200px-Coat_of_Arms_of_Palca.png">
                    </div>
                    <h3 class="partner-name text-center">Muni. Palca</h3>
                    <p class="partner-description text-center text-sm">
                        <strong>Alcalde (2023-2026):</strong> Toribio Zanga Onofre <br><br>
                        Gracias al trabajo conjunto con la Municipalidad de Palca, fortalecemos el desarrollo
                        de nuestras comunidades fronterizas y altoandinas, promoviendo proyectos de saneamiento
                        y bienestar social para todos los palqueños.
                    </p>
                    <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0
                                    group-hover:scale-x-100 transition-transform duration-300"
                        style="background-color: var(--brand-red);"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. ALUMNOS (CARRUSEL) --}}
    <section class="py-24 bg-white dark:bg-black relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-center mb-20 text-gray-900 dark:text-white">
                Historias Reales
            </h2>

            <div class="relative group">
                <div id="students-slider"
                    class="flex gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar pb-10 px-4"
                    style="-webkit-overflow-scrolling: touch;">
                    @forelse($beneficiados as $beneficiado)
                        <div class="snap-center shrink-0 w-full md:w-[calc(50%-16px)] flex">
                            <div class="student-slide w-full">
                                <div
                                    class="student-profile p-8 flex flex-col sm:flex-row items-start space-y-6 sm:space-y-0 sm:space-x-6 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors h-full">
                                    <img alt="{{ $beneficiado->nombre }}"
                                        class="w-24 h-24 rounded-full object-cover border-2 flex-shrink-0"
                                        style="border-color: var(--brand-red);"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg" />
                                    <div>
                                        <h4 class="font-bold text-xl text-gray-900 dark:text-white">
                                            {{ $beneficiado->nombre }}
                                        </h4>
                                        <p class="text-xs font-bold uppercase tracking-wide mb-3"
                                            style="color: var(--brand-red);">
                                            Becario {{ date('Y') }}
                                        </p>
                                        <p class="text-gray-600 dark:text-gray-400 italic text-base">
                                            "{{ $beneficiado->testimonio ?? 'Experiencia increíble.' }}"
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        @foreach([1, 2, 3, 4] as $i)
                            <div class="snap-center shrink-0 w-full md:w-[calc(50%-16px)] flex">
                                <div class="student-slide w-full">
                                    <div class="student-profile p-8 flex items-start space-x-6">
                                        <img class="w-24 h-24 rounded-full border-2" style="border-color: var(--brand-red);"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"
                                            alt="Estudiante">
                                        <div>
                                            <h4 class="font-bold text-xl dark:text-white">Estudiante Ejemplar {{ $i }}</h4>
                                            <p class="text-gray-600 dark:text-gray-400 italic">
                                                "Gracias a PROMUBE pude estudiar mi carrera soñada."
                                            </p>
                                        </div>
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
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-gray-800 dark:text-white">
                Nuestras Sedes
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- AREQUIPA --}}
                <div class="location-card group">
                    <div class="location-image-container">
                        <img class="h-full w-full object-cover" alt="Sede Arequipa"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd2_H08jilsWIyRClEVK8eRTHnJGc3jQKquVDiSoNGEmoEB0C6UCpS7WeA8aDPrO52EOkPAKHDWRSSDC-CvWlIn_NF_xhC7D77LVrpgHAWwwZUYdgrD9MNYUhAJPn7H1g40rCQNKpMSsI8w1pnFQnDuHRLeFLZ5JWnmxFqjoby8WiAddfI1QE-0yVUXwJn1BOTldsaWXw3NK5bk6E1Nd9-wP0qxr1pTSn0WZul-HeY6eu5E7RZpploWOPfTa6-5N3ra-k2AbbdoYI" />
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full"
                            style="color: var(--brand-red);">Arequipa</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="sede-icon">
                                <span class="material-symbols-outlined text-2xl">apartment</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Arequipa</h3>
                        </div>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg mt-1 text-gray-400">location_on</span>
                                <span class="text-sm">
                                    C. Sanchez Trujillo 240, Miraflores 04004, Arequipa.
                                </span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg text-gray-400">schedule</span>
                                <span class="text-sm">Lun-Vie, 9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg text-gray-400">call</span>
                                <span class="text-sm font-medium">931 315 933</span>
                            </div>
                        </div>
                        <a href="{{ route('sedes.index') }}#arequipa"
                            class="mt-auto block w-full py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-center font-bold hover:text-white transition-colors"
                            onmouseover="this.style.backgroundColor='var(--brand-red)'"
                            onmouseout="this.style.backgroundColor=''">
                            Ver mapa
                        </a>
                    </div>
                </div>

                {{-- TACNA --}}
                <div class="location-card group">
                    <div class="location-image-container">
                        <img class="h-full w-full object-cover" alt="Sede Tacna"
                            src="{{ asset('img/sedes/sede_tacna.jpg') }}" />
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full"
                            style="color: var(--brand-red);">Tacna</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="sede-icon">
                                <span class="material-symbols-outlined text-2xl">business</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Tacna</h3>
                        </div>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg mt-1 text-gray-400">location_on</span>
                                <span class="text-sm">
                                    Urbanización Bacigalupo, calle Olga Grohmann 1063,
                                    a media cuadra arriba del parque vial.
                                </span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg text-gray-400">schedule</span>
                                <span class="text-sm">
                                    Lun-Vie, 8:00 AM - 1:00 PM y 3:00 PM - 6:00 PM
                                </span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg text-gray-400">call</span>
                                <span class="text-sm font-medium">921 810 356</span>
                            </div>
                        </div>
                        <a href="{{ route('sedes.index') }}#tacna"
                            class="mt-auto block w-full py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-center font-bold hover:text-white transition-colors"
                            onmouseover="this.style.backgroundColor='var(--brand-red)'"
                            onmouseout="this.style.backgroundColor=''">
                            Ver mapa
                        </a>
                    </div>
                </div>

                {{-- LIMA --}}
                <div class="location-card group">
                    <div class="location-image-container">
                        <img class="h-full w-full object-cover" alt="Sede Lima"
                            src="{{ asset('img/sedes/sede_lima.jpg') }}" />
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full"
                            style="color: var(--brand-red);">Lima</div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="sede-icon">
                                <span class="material-symbols-outlined text-2xl">location_city</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Lima</h3>
                        </div>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg mt-1 text-gray-400">location_on</span>
                                <span class="text-sm">
                                    Av. Honorio Delgado 169, San Martín de Porres 15102.
                                </span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg text-gray-400">schedule</span>
                                <span class="text-sm">
                                    Lun-Vie, 9:00 AM - 6:00 PM
                                </span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-lg text-gray-400">call</span>
                                <span class="text-sm font-medium">976 156 196</span>
                            </div>
                        </div>
                        <a href="{{ route('sedes.index') }}#lima"
                            class="mt-auto block w-full py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-center font-bold hover:text-white transition-colors"
                            onmouseover="this.style.backgroundColor='var(--brand-red)'"
                            onmouseout="this.style.backgroundColor=''">
                            Ver mapa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            /* TYPEWRITER */
            const textElement = document.getElementById('typewriter-text');
            const phrases = ["Beca Tecsup", "Beca Cayetano Heredia", "Beca Ferreyros", "Beca BCP", "Beca Uni", "Beca San Marcos"];
            let phraseIndex = 0, charIndex = 0, isDeleting = false;

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
                    setTimeout(type, 2000);
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    setTimeout(type, 500);
                } else {
                    setTimeout(type, isDeleting ? 50 : 100);
                }
            }
            if (textElement) type();

            /* CARRUSEL ALUMNOS */
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
                        dot.addEventListener('click', () => {
                            slider.scrollTo({ left: i * containerWidth, behavior: 'smooth' });
                        });
                        dotsContainer.appendChild(dot);
                    }
                };
                slider.addEventListener('scroll', () => {
                    const containerWidth = slider.clientWidth;
                    const scrollLeft = slider.scrollLeft;
                    const activeIndex = Math.round(scrollLeft / containerWidth);
                    const dots = dotsContainer.children;
                    for (let i = 0; i < dots.length; i++) {
                        if (i === activeIndex) dots[i].classList.add('active');
                        else dots[i].classList.remove('active');
                    }
                });
                updateDots();
                window.addEventListener('resize', updateDots);
            }
        });
    </script>
@endsection