@extends('layouts.public')

@section('title', 'Beca BCP - PROMUBE')

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

        /* Utilidades de color */
        .text-brand { color: var(--brand-red) !important; }
        .bg-brand { background-color: var(--brand-red) !important; }
        .bg-brand-light { background-color: var(--brand-red-light) !important; }

        /* Contenedor Principal */
        .bcp-wrapper {
            background-color: #f9fafb; /* Fondo gris muy suave */
            min-height: 100vh;
        }

        /* Tarjeta Principal */
        .bcp-card {
            background: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.08); /* Sombra suave y elevada */
            border: 1px solid rgba(0,0,0,0.03);
            overflow: hidden;
        }

        /* Encabezado */
        .bcp-pill {
            display: inline-block;
            padding: 0.35rem 1rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            background-color: var(--brand-red-light);
            color: var(--brand-red);
            margin-bottom: 1rem;
        }

        .bcp-title {
            font-size: clamp(2rem, 4vw, 3rem); /* Título responsivo grande */
            font-weight: 900;
            color: #111827;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }

        .bcp-subtitle {
            font-size: 1.1rem;
            color: #4b5563;
            line-height: 1.6;
        }

        /* Secciones */
        .bcp-section-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-weight: 800;
            color: var(--brand-red);
            margin-bottom: 0.5rem;
            display: block;
        }

        .bcp-section-heading {
            font-size: 1.75rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 1.5rem;
        }

        .bcp-text {
            font-size: 1rem;
            color: #374151;
            line-height: 1.7;
        }

        /* Tarjetas de Beneficios */
        .bcp-benefit-card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1.5rem;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s var(--ease-out-expo);
            height: 100%;
        }

        .bcp-benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px -5px rgba(239, 35, 60, 0.15); /* Sombra roja al hover */
            border-color: rgba(239, 35, 60, 0.2);
        }

        .bcp-benefit-icon {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--brand-red-light);
            color: var(--brand-red);
            margin-bottom: 1rem;
        }

        .bcp-benefit-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .bcp-benefit-text {
            font-size: 0.9rem;
            color: #6b7280;
            line-height: 1.5;
        }

        /* Pasos (Timeline) */
        .bcp-step {
            position: relative;
            padding-left: 1.5rem; /* Espacio para la línea en móvil */
        }
        
        .bcp-step-circle {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--brand-red);
            color: white;
            font-size: 1.25rem;
            font-weight: 800;
            box-shadow: 0 4px 10px rgba(239, 35, 60, 0.4);
            z-index: 2;
            position: relative;
        }

        /* Línea conectora (Desktop) */
        @media (min-width: 1024px) {
            .bcp-steps-container {
                position: relative;
                display: flex;
                justify-content: space-between;
                gap: 2rem;
            }
            /* Línea gris de fondo */
            .bcp-steps-container::before {
                content: '';
                position: absolute;
                top: 1.5rem; /* Mitad del círculo */
                left: 0;
                width: 100%;
                height: 2px;
                background-color: #e5e7eb;
                z-index: 0;
            }
            .bcp-step { padding-left: 0; flex: 1; text-align: center; display: flex; flex-direction: column; align-items: center; }
            .bcp-step-text { text-align: center; }
        }

        /* Botón CTA Flotante */
        .bcp-cta-btn {
            background-color: var(--brand-red);
            color: white;
            border-radius: 9999px;
            font-weight: 700;
            padding: 1rem 3rem;
            font-size: 1.1rem;
            box-shadow: 0 10px 25px -5px rgba(239, 35, 60, 0.5);
            transition: all 0.3s ease;
            display: inline-flex; align-items: center; gap: 0.5rem;
        }
        .bcp-cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(239, 35, 60, 0.7);
        }
    </style>

    <div class="bcp-wrapper py-12 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Botón Volver --}}
            <div class="mb-8">
                <a href="{{ route('becas.index') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-brand transition-colors">
                    <span class="material-symbols-outlined mr-1 text-lg">arrow_back</span>
                    Volver al catálogo
                </a>
            </div>

            <div class="bcp-card">
                
                {{-- HERO INTERNO (Imagen + Título) --}}
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    {{-- Imagen --}}
                    <div class="relative h-64 lg:h-auto overflow-hidden bg-gray-100">
                        <img src="{{ asset('img/becas/beca-bcp.png') }}" 
                             alt="Estudiante Beca BCP" 
                             class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                        {{-- Overlay degradado sutil --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-black/10"></div>
                    </div>

                    {{-- Contenido Header --}}
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <div>
                            <span class="bcp-pill">Beca BCP</span>
                            <h1 class="bcp-title mb-4">Postula y potencia tu talento</h1>
                            <p class="bcp-subtitle">
                                Un programa integral del BCP diseñado para jóvenes sobresalientes con recursos limitados. 
                                Transforma tu futuro con educación de calidad.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CONTENIDO DETALLADO --}}
                <div class="p-8 lg:p-12 space-y-16">
                    
                    {{-- DESCRIPCIÓN --}}
                    <section class="max-w-3xl">
                        <span class="bcp-section-label">Sobre el programa</span>
                        <h2 class="bcp-section-heading">¿De qué trata la Beca BCP?</h2>
                        <div class="space-y-4 text-lg">
                            <p class="bcp-text">
                                El programa <strong>Beca BCP – Carreras Universitarias</strong> ofrece la oportunidad única de estudiar una carrera profesional en las mejores universidades del país.
                            </p>
                            <p class="bcp-text">
                                No es solo una ayuda económica; es un compromiso con tu desarrollo. Buscamos jóvenes con vocación de servicio, liderazgo y ganas de impactar positivamente en su comunidad.
                            </p>
                        </div>
                    </section>

                    <hr class="border-gray-100">

                    {{-- BENEFICIOS (GRID 2x2) --}}
                    <section>
                        <div class="text-center mb-10">
                            <span class="bcp-section-label">Lo que recibes</span>
                            <h2 class="bcp-section-heading">Beneficios exclusivos</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            {{-- Beneficio 1 --}}
                            <div class="bcp-benefit-card">
                                <div class="flex flex-col sm:flex-row gap-5 items-start">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined text-3xl">school</span>
                                    </div>
                                    <div>
                                        <h3 class="bcp-benefit-title">Cobertura Académica Total</h3>
                                        <p class="bcp-benefit-text">Olvídate de las pensiones y matrículas. Cubrimos el 100% de los costos académicos durante toda tu carrera.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Beneficio 2 --}}
                            <div class="bcp-benefit-card">
                                <div class="flex flex-col sm:flex-row gap-5 items-start">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined text-3xl">laptop_mac</span>
                                    </div>
                                    <div>
                                        <h3 class="bcp-benefit-title">Herramientas Digitales</h3>
                                        <p class="bcp-benefit-text">Te entregamos una laptop y acceso a recursos digitales para que estudies sin limitaciones tecnológicas.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Beneficio 3 --}}
                            <div class="bcp-benefit-card">
                                <div class="flex flex-col sm:flex-row gap-5 items-start">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                                    </div>
                                    <div>
                                        <h3 class="bcp-benefit-title">Desarrollo de Talento</h3>
                                        <p class="bcp-benefit-text">Accede a talleres de habilidades blandas, liderazgo y programas de empleabilidad exclusivos del BCP.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Beneficio 4 --}}
                            <div class="bcp-benefit-card">
                                <div class="flex flex-col sm:flex-row gap-5 items-start">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined text-3xl">support_agent</span>
                                    </div>
                                    <div>
                                        <h3 class="bcp-benefit-title">Acompañamiento Constante</h3>
                                        <p class="bcp-benefit-text">No estarás solo. Contarás con un tutor y una red de soporte psicológico y académico durante tus estudios.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <hr class="border-gray-100">

                    {{-- PROCESO DE POSTULACIÓN (TIMELINE) --}}
                    <section>
                        <div class="text-center mb-12">
                            <span class="bcp-section-label">¿Cómo participar?</span>
                            <h2 class="bcp-section-heading">Tu camino a la beca</h2>
                        </div>

                        <div class="bcp-steps-container flex flex-col lg:flex-row gap-8 lg:gap-4 relative">
                            {{-- Paso 1 --}}
                            <div class="bcp-step flex-1">
                                <div class="bcp-step-circle mb-4 mx-auto">1</div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Registro Online</h3>
                                <p class="bcp-step-text text-gray-600 text-sm max-w-xs mx-auto">
                                    Completa el formulario en la web del BCP con tus datos personales y académicos.
                                </p>
                            </div>

                            {{-- Paso 2 --}}
                            <div class="bcp-step flex-1">
                                <div class="bcp-step-circle mb-4 mx-auto">2</div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Evaluación</h3>
                                <p class="bcp-step-text text-gray-600 text-sm max-w-xs mx-auto">
                                    Revisión de requisitos, notas y situación socioeconómica. Preselección de candidatos.
                                </p>
                            </div>

                            {{-- Paso 3 --}}
                            <div class="bcp-step flex-1">
                                <div class="bcp-step-circle mb-4 mx-auto">3</div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2">Entrevista Final</h3>
                                <p class="bcp-step-text text-gray-600 text-sm max-w-xs mx-auto">
                                    Entrevista personal con el comité para conocer tu historia, motivación y potencial.
                                </p>
                            </div>
                        </div>
                    </section>
                </div> {{-- Fin padding content --}}
            </div> {{-- Fin Card --}}
        </div>
    </div>
@endsection