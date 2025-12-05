@extends('layouts.public')

@section('title', 'Beca BCP - PROMUBE')

@section('content')
    <style>
        :root {
            --promube-red: #D9363E;
            --promube-soft: #FFF5F6;
        }

        /* Fondo general */
        .bcp-wrapper {
            background: #ffffffff;
        }

        /* Tarjeta principal */
        .bcp-card {
            background: #ffffff;
            border-radius: 1.75rem;
            border: 2px solid #f7faffff;   /* borde más grueso */
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        .bcp-pill {
            display: inline-flex;
            align-items: text-left;
            padding: 0.25rem 0.9rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            background: var(--promube-soft);
            color: var(--promube-red);
        }
        .bcp-process-section {
            margin-top: 2.5rem;   /* espacio extra arriba */
            text-align: center;   /* centra los textos dentro */
        }

        .bcp-process-heading {
            justify-content: center;  /* centra el texto y la rayita roja */
        }

        .bcp-title {
            font-size: 2rem;
            font-weight: 800;
            color: #111827;
            letter-spacing: -0.03em;
        }

        .bcp-subtitle {
            font-size: 0.95rem;
            color: #6b7280;
        }

        /* Subtítulos de sección (más llamativos) */
        .bcp-section-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-weight: 800;
            color: var(--promube-red);
        }
        .bcp-section-heading {
            font-size: 1.1rem;
            font-weight: 800;
            color: #111827;
            display: inline-flex;
            align-items:left;
            gap: 0.6rem;
        }
        .bcp-text {
            font-size: 0.95rem;
            color: #374151;
            line-height: 1.7;
        }

        /* Beneficios (tarjetas horizontales) */
        .bcp-benefit-card {
            background: #ebeffaff;
            border-radius: 1.25rem;
            padding: 1.3rem 1.4rem;
            border: 2px solid #cd4141ff;   /* borde más grueso */
            transition: all 0.25s ease;
        }

        .bcp-benefit-card:hover {
            border-color: rgba(217, 54, 62, 0.35);
            box-shadow: 0 14px 30px rgba(217, 54, 62, 0.12);
            transform: translateY(-2px);
        }

        .bcp-benefit-icon {
            width: 3.4rem;     /* icono más grande */
            height: 3.4rem;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--promube-soft);
            color: var(--promube-red);
        }

        .bcp-benefit-icon .material-symbols-outlined {
            font-size: 1.9rem; /* icono más grande */
        }

        .bcp-benefit-title {
            font-size: 1rem;          /* título más grande */
            font-weight: 700;
            color: #111827;
        }

        .bcp-benefit-text {
            font-size: 0.9rem;        /* texto más grande */
            color: #000000ff;
        }

        /* Pasos */
        .bcp-step-circle {
            width: 2.9rem;   /* círculo más grande */
            height: 2.9rem;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--promube-red);
            color: white;
            font-size: 1rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .bcp-step-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #111827;
            text-align: left;
        }

        .bcp-step-text {
            font-size: 0.8rem;
            color: #141313ff;
            text-align: left;
        }

        /* CTA */
        .bcp-cta-btn {
            background: var(--promube-red);
            color: #ffffff;
            border-radius: 999px;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.9rem 2.5rem;
            box-shadow: 0 18px 40px rgba(217, 54, 62, 0.35);
            transition: all 0.2s ease;
        }
        .bcp-cta-btn:hover {
            filter: brightness(1.05);
            transform: translateY(-1px);
        }

        /* Grid horizontal en desktop */
        @media (min-width: 1024px) {
            .bcp-top-grid {
                display: grid;
                grid-template-columns: minmax(0, 1.35fr) minmax(0, 1.65fr);
                gap: 2.2rem;
                align-items: stretch;
            }
        }

        @media (max-width: 639px) {
            .bcp-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="bcp-wrapper min-h-screen py-10 lg:py-16">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-10">

            {{-- Botón volver --}}
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-800 mb-4">
                <span class="material-symbols-outlined mr-1 text-base">arrow_back</span>
                Volver a becas
            </a>

            {{-- Tarjeta horizontal --}}
            <div class="bcp-card overflow-hidden">
                <div class="bcp-top-grid flex flex-col lg:flex-row">

                    {{-- Columna imagen --}}
                    <div class="lg:border-r border-gray-100">
                        <div class="w-full h-56 sm:h-64 lg:h-full overflow-hidden">
                            <img
                                src="{{ asset('img/becas/beca-bcp.png') }}"
                                alt="Beca BCP"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    </div>

                    {{-- Columna texto principal --}}
                    <div class="p-6 sm:p-8 lg:p-10 space-y-8 flex flex-col justify-center">
                        <header class="space-y-3">
                            <span class="bcp-pill">Beca BCP</span>
                            <h1 class="bcp-title">Postula y potencia tu talento</h1>
                            <p class="bcp-subtitle max-w-xl">
                                Programa de beca universitaria del BCP para jóvenes con alto rendimiento académico
                                y recursos económicos limitados.
                            </p>
                        </header>

                        {{-- Descripción --}}
                        <section class="space-y-2 max-w-xl">
                            <p class="bcp-section-label">Descripción</p>
                            <h2 class="bcp-section-heading">¿De qué trata la Beca BCP?</h2>
                            <p class="bcp-text">
                                El programa <strong>Beca BCP – Carreras Universitarias</strong> ofrece la oportunidad
                                de estudiar una carrera profesional en universidades aliadas, cubriendo principalmente
                                los costos académicos y brindando acompañamiento integral al estudiante.
                            </p>
                            <p class="bcp-text">
                                Está dirigida a jóvenes talentosos con vocación de servicio, que destaquen por su
                                esfuerzo, liderazgo y compromiso con el desarrollo de su comunidad.
                            </p>
                        </section>
                    </div>
                </div>

                {{-- Secciones inferiores --}}
                <div class="px-6 sm:px-8 lg:px-10 pb-8 lg:pb-10 pt-6 space-y-10 border-t border-gray-100">

                    {{-- BENEFICIOS (2x2, icono izq – texto der) --}}
                    <section class="space-y-6">
                        <div class="text-center">
                            <p class="bcp-section-label">Beneficios</p>
                            <h2 class="bcp-section-heading justify-center">Lo que ganas con la Beca BCP</h2>
                        </div>

                        <div class="flex justify-center">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl w-full">

                                {{-- Beneficio 1 --}}
                                <div class="bcp-benefit-card flex flex-col sm:flex-row sm:items-start gap-4 sm:gap-5 text-left">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined">school</span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="bcp-benefit-title">Costos académicos</p>
                                        <p class="bcp-benefit-text">
                                            Cobertura de pensiones y pagos administrativos según
                                            condiciones de la beca.
                                        </p>
                                    </div>
                                </div>

                                {{-- Beneficio 2 --}}
                                <div class="bcp-benefit-card flex flex-col sm:flex-row sm:items-start gap-4 sm:gap-5 text-left">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined">workspace_premium</span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="bcp-benefit-title">Desarrollo de talento</p>
                                        <p class="bcp-benefit-text">
                                            Talleres, mentorías y acompañamiento para potenciar
                                            tu perfil profesional.
                                        </p>
                                    </div>
                                </div>

                                {{-- Beneficio 3 --}}
                                <div class="bcp-benefit-card flex flex-col sm:flex-row sm:items-start gap-4 sm:gap-5 text-left">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined">computer</span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="bcp-benefit-title">Recursos para estudiar</p>
                                        <p class="bcp-benefit-text">
                                            Posibilidad de laptop, cursos complementarios y otros
                                            apoyos formativos.
                                        </p>
                                    </div>
                                </div>

                                {{-- Beneficio 4 --}}
                                <div class="bcp-benefit-card flex flex-col sm:flex-row sm:items-start gap-4 sm:gap-5 text-left">
                                    <div class="bcp-benefit-icon flex-shrink-0">
                                        <span class="material-symbols-outlined">groups</span>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="bcp-benefit-title">Red de mentores</p>
                                        <p class="bcp-benefit-text">
                                            Comunidad de becarios y profesionales del BCP que te
                                            acompañan en el camino.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    {{-- Proceso de postulación: 1, 2 y 3 en horizontal --}}
                   <section class="bcp-process-section">
                       <div class="text-center">
                       <p class="bcp-section-label">Proceso de postulación</p>
                       <h2 class="bcp-section-heading bcp-process-heading mt-1">
                        Pasos para postular a la Beca BCP
                       </h2>
                   </div>
                        {{-- fila horizontal --}}
                        <div class="flex flex-col gap-6 mt-4 lg:flex-row lg:gap-10">

                            {{-- Paso 1 --}}
                            <div class="flex-1 flex items-start gap-4">
                                <div class="bcp-step-circle">1</div>
                                <div class="space-y-1">
                                    <p class="bcp-step-title">Registro</p>
                                    <p class="bcp-step-text">
                                        Completa el formulario en línea con tu información personal y académica.
                                    </p>
                                </div>
                            </div>

                            {{-- Paso 2 --}}
                            <div class="flex-1 flex items-start gap-4">
                                <div class="bcp-step-circle">2</div>
                                <div class="space-y-1">
                                    <p class="bcp-step-title">Evaluación</p>
                                    <p class="bcp-step-text">
                                        Se revisan tus notas, situación económica y participación en actividades.
                                    </p>
                                </div>
                            </div>

                            {{-- Paso 3 --}}
                            <div class="flex-1 flex items-start gap-4">
                                <div class="bcp-step-circle">3</div>
                                <div class="space-y-1">
                                    <p class="bcp-step-title">Entrevista</p>
                                    <p class="bcp-step-text">
                                        Los finalistas pasan a una entrevista personal para conocer su motivación
                                        y proyecto de vida.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
