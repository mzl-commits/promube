@extends('layouts.public')

@section('title', ($beca->nombre ?? 'Beca') . ' - PROMUBE')

@section('content')
    <style>
        /* =========================================================
           SHOW BECA - LOOK & FEEL alineado al layout PROMUBE
           - Misma marca (#EF233C) y sombras suaves
           - Card principal + aside sticky (desktop) para que no se vea “vacío”
           - Beneficios y pasos con estilo más moderno
        ========================================================== */
        :root{
            --brand-red:#ef233c;
            --brand-red-light: rgba(239,35,60,.10);
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
        }

        /* Fondo del show (más elegante y a juego con la web) */
        .beca-page{
            background: linear-gradient(180deg, #ffffff 0%, #f7f7f7 60%, #f3f4f6 100%);
        }

        /* Card principal */
        .beca-card{
            background:#fff;
            border-radius: 1.75rem;
            border: 1px solid rgba(0,0,0,.05);
            box-shadow: 0 22px 50px -18px rgba(0,0,0,.14);
            overflow:hidden;
        }

        /* HERO interno */
        .beca-hero{
            position:relative;
            overflow:hidden;
            background:#0b0b0b;
        }
        .beca-hero-img{
            width:100%;
            height:100%;
            object-fit:cover;
            transform: scale(1.02);
            transition: transform .9s ease;
        }
        .beca-hero:hover .beca-hero-img{ transform: scale(1.06); }

        .beca-hero-overlay{
            position:absolute; inset:0;
            background:
                linear-gradient(90deg, rgba(0,0,0,.70) 0%, rgba(0,0,0,.35) 52%, rgba(0,0,0,.10) 100%),
                radial-gradient(60% 60% at 15% 30%, rgba(239,35,60,.35) 0%, transparent 60%);
        }

        /* Pill / badge */
        .beca-pill{
            display:inline-flex;
            align-items:center;
            gap:.45rem;
            padding:.4rem 1rem;
            border-radius:999px;
            font-size:.75rem;
            font-weight:900;
            letter-spacing:.12em;
            text-transform:uppercase;
            background: var(--brand-red-light);
            color: var(--brand-red);
        }

        /* Títulos */
        .beca-title{
            font-size: clamp(2.1rem, 4vw, 3.1rem);
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1.06;
        }
        .beca-subtitle{
            font-size: 1.06rem;
            line-height: 1.7;
            color: rgba(255,255,255,.82);
        }

        /* Labels sección */
        .sec-label{
            font-size:.8rem;
            letter-spacing:.16em;
            text-transform:uppercase;
            font-weight:900;
            color: var(--brand-red);
        }
        .sec-title{
            font-size: 1.65rem;
            font-weight: 900;
            color:#111827;
            margin-top:.35rem;
        }
        .sec-text{
            color:#374151;
            line-height:1.75;
        }

        /* Beneficios */
        .benefit-card{
            background:#fff;
            border-radius: 1.1rem;
            border:1px solid rgba(0,0,0,.06);
            box-shadow: 0 10px 24px -18px rgba(0,0,0,.25);
            transition: transform .35s var(--ease-out-expo), box-shadow .35s var(--ease-out-expo), border-color .35s var(--ease-out-expo);
            height:100%;
        }
        .benefit-card:hover{
            transform: translateY(-6px);
            border-color: rgba(239,35,60,.25);
            box-shadow: 0 22px 45px -25px rgba(239,35,60,.45);
        }
        .benefit-icon{
            width: 3.25rem;
            height: 3.25rem;
            border-radius: 1rem;
            display:flex; align-items:center; justify-content:center;
            background: var(--brand-red-light);
            color: var(--brand-red);
            flex-shrink:0;
        }
        .benefit-title{
            font-weight: 900;
            color:#111827;
            margin-bottom:.35rem;
        }
        .benefit-text{
            color:#6b7280;
            line-height:1.55;
            font-size:.95rem;
        }

        /* Aside (a la derecha en desktop) */
        .aside-card{
            background:#fff;
            border-radius: 1.35rem;
            border:1px solid rgba(0,0,0,.06);
            box-shadow: 0 18px 44px -30px rgba(0,0,0,.35);
            overflow:hidden;
        }
        .aside-head{
            background: linear-gradient(135deg, rgba(239,35,60,.18), rgba(239,35,60,.04));
            border-bottom: 1px solid rgba(0,0,0,.05);
        }
        .aside-pill{
            display:flex;
            align-items:center;
            gap:.85rem;
            padding:.95rem 1rem;
            border-radius: 999px;
            background: rgba(17,24,39,.04);
            border: 1px solid rgba(17,24,39,.08);
            transition: transform .18s ease, background .18s ease, border-color .18s ease;
        }
        .aside-pill:hover{
            transform: translateY(-1px);
            background: rgba(17,24,39,.06);
            border-color: rgba(17,24,39,.12);
        }

        /* CTA principal */
        .cta-btn{
            background: var(--brand-red);
            color:#fff;
            border-radius: 999px;
            font-weight: 900;
            padding: .95rem 1.2rem;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.55rem;
            width:100%;
            box-shadow: 0 18px 40px -22px rgba(239,35,60,.75);
            transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }
        .cta-btn:hover{
            transform: translateY(-2px);
            filter: brightness(1.02);
            box-shadow: 0 28px 60px -28px rgba(239,35,60,.95);
        }
        .cta-ghost{
            background: rgba(17,24,39,.04);
            border: 1px solid rgba(17,24,39,.10);
            color:#111827;
            border-radius: 999px;
            font-weight: 900;
            padding: .9rem 1.1rem;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.55rem;
            width:100%;
            transition: transform .2s ease, background .2s ease, border-color .2s ease;
        }
        .cta-ghost:hover{
            transform: translateY(-1px);
            background: rgba(17,24,39,.06);
            border-color: rgba(17,24,39,.14);
        }

        /* Timeline (pasos) */
        .steps{
            position:relative;
        }
        /* línea vertical (mobile) */
        .steps::before{
            content:"";
            position:absolute;
            left: 1.15rem;
            top: .3rem;
            bottom: .3rem;
            width: 2px;
            background: #e5e7eb;
        }
        .step{
            position:relative;
            padding-left: 3.3rem;
        }
        .step-dot{
            position:absolute;
            left: .25rem;
            top: .15rem;
            width: 2.2rem;
            height: 2.2rem;
            border-radius: 999px;
            display:flex; align-items:center; justify-content:center;
            background: var(--brand-red);
            color:#fff;
            font-weight:900;
            box-shadow: 0 10px 22px -12px rgba(239,35,60,.70);
        }

        /* línea horizontal (desktop) */
        @media (min-width: 1024px){
            .steps::before{ display:none; }
            .steps-grid{
                position:relative;
                display:grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1.25rem;
            }
            .steps-grid::before{
                content:"";
                position:absolute;
                top: 1.1rem;
                left: 1rem;
                right: 1rem;
                height: 2px;
                background: #e5e7eb;
            }
            .step{
                padding-left: 0;
                text-align:center;
                display:flex;
                flex-direction:column;
                align-items:center;
            }
            .step-dot{
                position:relative;
                left:auto; top:auto;
                margin-bottom: .75rem;
            }
        }
    </style>

    <div class="beca-page py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER DEL SHOW: volver --}}
            <div class="mb-8">
                <a href="{{ route('becas.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-black text-gray-500 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Volver al catálogo
                </a>
            </div>

            <div class="beca-card">

                {{-- HERO INTERNO (imagen + overlay + textos) --}}
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    {{-- Imagen --}}
                    <div class="beca-hero h-72 lg:h-auto">
                        <img
                            src="{{ asset($beca->banner ?? $beca->imagen_portada ?? 'img/becas/default.png') }}"
                            alt="{{ $beca->nombre }}"
                            class="beca-hero-img"
                        />
                        <div class="beca-hero-overlay"></div>

                        {{-- Texto sobre la imagen (solo desktop para que se vea pro) --}}
                        <div class="absolute inset-0 hidden lg:flex items-end p-10">
                            <div class="max-w-md">
                                <span class="beca-pill">
                                    <span class="material-symbols-outlined text-base">workspace_premium</span>
                                    Beca
                                </span>
                                <h1 class="beca-title text-white mt-4">
                                    {{ $beca->titulo ?? 'Postula y potencia tu talento' }}
                                </h1>
                                <p class="beca-subtitle mt-4">
                                    {{ $beca->subtitulo ?? 'Programa diseñado para jóvenes talentosos con ganas de transformar su futuro a través de la educación.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Header contenido (mobile/tablet) + resumen --}}
                    <div class="p-8 lg:p-10">
                        {{-- En mobile mostramos el título aquí (en desktop ya está sobre la imagen) --}}
                        <div class="lg:hidden">
                            <span class="beca-pill">
                                <span class="material-symbols-outlined text-base">workspace_premium</span>
                                {{ $beca->nombre }}
                            </span>

                            <h1 class="beca-title text-gray-900 mt-4">
                                {{ $beca->titulo ?? 'Postula y potencia tu talento' }}
                            </h1>

                            <p class="text-gray-600 mt-4 leading-relaxed">
                                {{ $beca->subtitulo ?? 'Programa diseñado para jóvenes talentosos con ganas de transformar su futuro a través de la educación.' }}
                            </p>
                        </div>

                        {{-- “Quick info” para que el lado derecho no se vea vacío --}}
                        <div class="mt-6 lg:mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="rounded-2xl border border-black/5 bg-black/[0.02] p-5">
                                <p class="text-xs font-black tracking-[0.18em] uppercase text-gray-500">Programa</p>
                                <p class="mt-2 font-black text-gray-900">
                                    {{ $beca->nombre ?? 'Beca' }}
                                </p>
                            </div>

                            <div class="rounded-2xl border border-black/5 bg-black/[0.02] p-5">
                                <p class="text-xs font-black tracking-[0.18em] uppercase text-gray-500">Estado</p>
                                <p class="mt-2 font-black text-gray-900">
                                    {{ $beca->estado ?? 'Disponible' }}
                                </p>
                            </div>
                        </div>

                        {{-- Nota sutil --}}
                        <div class="mt-6 rounded-2xl border border-[rgba(239,35,60,.20)] bg-[rgba(239,35,60,.06)] p-5">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary mt-0.5">info</span>
                                <p class="text-sm text-gray-700 leading-relaxed">
                                    Revisa los requisitos y el proceso de postulación. Si la convocatoria cambia, esta página se actualiza.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CUERPO: contenido + aside (desktop) --}}
                <div class="p-8 lg:p-12">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                        {{-- MAIN --}}
                        <div class="lg:col-span-8 space-y-14">

                            {{-- DESCRIPCIÓN --}}
                            <section class="max-w-3xl">
                                <p class="sec-label">Sobre el programa</p>
                                <h2 class="sec-title">¿De qué trata {{ $beca->nombre }}?</h2>

                                <div class="mt-5 space-y-4">
                                    @if(!empty($beca->descripcion))
                                        <p class="sec-text text-[1.02rem]">
                                            {!! nl2br(e($beca->descripcion)) !!}
                                        </p>
                                    @else
                                        <p class="sec-text text-[1.02rem]">
                                            El programa <strong>{{ $beca->nombre }}</strong> ofrece la oportunidad de acceder a una formación de calidad,
                                            dirigida a estudiantes con alto desempeño académico y proyección de liderazgo.
                                        </p>
                                        <p class="sec-text text-[1.02rem]">
                                            Más que un apoyo económico, busca impulsar tu desarrollo integral y tu compromiso con la comunidad.
                                        </p>
                                    @endif
                                </div>
                            </section>

                            <hr class="border-gray-100">

                            {{-- BENEFICIOS --}}
                            <section>
                                <div class="text-center mb-10">
                                    <p class="sec-label">Lo que recibes</p>
                                    <h2 class="sec-title">Beneficios exclusivos</h2>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                                    @if(is_array($beca->beneficios) && count($beca->beneficios))
                                        @foreach($beca->beneficios as $beneficio)
                                            <div class="benefit-card p-6">
                                                <div class="flex gap-5 items-start">
                                                    <div class="benefit-icon">
                                                        <span class="material-symbols-outlined text-3xl">
                                                            {{ $beneficio['icon'] ?? 'verified' }}
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h3 class="benefit-title text-lg">
                                                            {{ $beneficio['titulo'] ?? 'Beneficio' }}
                                                        </h3>
                                                        <p class="benefit-text">
                                                            {{ $beneficio['descripcion'] ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        {{-- Fallback --}}
                                        <div class="benefit-card p-6">
                                            <div class="flex gap-5 items-start">
                                                <div class="benefit-icon">
                                                    <span class="material-symbols-outlined text-3xl">school</span>
                                                </div>
                                                <div>
                                                    <h3 class="benefit-title text-lg">Cobertura Académica</h3>
                                                    <p class="benefit-text">Pensiones y matrículas cubiertas parcialmente o al 100%, según las condiciones de la beca.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="benefit-card p-6">
                                            <div class="flex gap-5 items-start">
                                                <div class="benefit-icon">
                                                    <span class="material-symbols-outlined text-3xl">laptop_mac</span>
                                                </div>
                                                <div>
                                                    <h3 class="benefit-title text-lg">Herramientas académicas</h3>
                                                    <p class="benefit-text">Acceso a recursos digitales, plataformas educativas y acompañamiento académico.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="benefit-card p-6">
                                            <div class="flex gap-5 items-start">
                                                <div class="benefit-icon">
                                                    <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                                                </div>
                                                <div>
                                                    <h3 class="benefit-title text-lg">Desarrollo de talento</h3>
                                                    <p class="benefit-text">Talleres, mentorías y espacios de formación para potenciar tus habilidades.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="benefit-card p-6">
                                            <div class="flex gap-5 items-start">
                                                <div class="benefit-icon">
                                                    <span class="material-symbols-outlined text-3xl">support_agent</span>
                                                </div>
                                                <div>
                                                    <h3 class="benefit-title text-lg">Acompañamiento</h3>
                                                    <p class="benefit-text">Soporte emocional y académico durante tu proceso de formación.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </section>

                            <hr class="border-gray-100">

                            {{-- PASOS --}}
                            <section>
                                <div class="text-center mb-12">
                                    <p class="sec-label">¿Cómo participar?</p>
                                    <h2 class="sec-title">Tu camino a la beca</h2>
                                </div>

                                {{-- Mobile: vertical / Desktop: horizontal --}}
                                <div class="steps">
                                    <div class="steps-grid lg:steps-grid space-y-8 lg:space-y-0">
                                        @php
                                            $pasos = (is_array($beca->pasos) && count($beca->pasos)) ? $beca->pasos : [
                                                ['titulo'=>'Registro', 'descripcion'=>'Completa el formulario en línea con tus datos personales y académicos.'],
                                                ['titulo'=>'Evaluación', 'descripcion'=>'Revisión de requisitos, historial académico y situación socioeconómica.'],
                                                ['titulo'=>'Resultados', 'descripcion'=>'Publicación de seleccionados y comunicación de los siguientes pasos.'],
                                            ];
                                        @endphp

                                        @foreach($pasos as $i => $paso)
                                            <div class="step">
                                                <div class="step-dot">{{ $i + 1 }}</div>
                                                <h3 class="font-black text-lg text-gray-900">
                                                    {{ $paso['titulo'] ?? ('Paso '.($i+1)) }}
                                                </h3>
                                                <p class="mt-2 text-gray-600 text-sm leading-relaxed max-w-sm">
                                                    {{ $paso['descripcion'] ?? '' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>

                        {{-- ASIDE (desktop sticky) --}}
                        <aside class="lg:col-span-4">
                            <div class="aside-card lg:sticky lg:top-28">
                                <div class="aside-head p-6">
                                    <p class="text-sm font-black tracking-[0.18em] uppercase text-gray-700">Acciones</p>
                                    <p class="mt-2 text-gray-900 font-black text-xl leading-tight">
                                        Postula a {{ $beca->nombre ?? 'esta beca' }}
                                    </p>
                                    <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                                        Si tienes dudas, contáctanos y te guiamos.
                                    </p>
                                </div>

                                <div class="p-6 space-y-4">
                                    {{-- CTA principal (por ahora manda al catálogo; si luego tienes link real, reemplaza aquí) --}}
                                    <a href="{{ route('becas.index') }}" class="cta-btn">
                                        Ver otras becas
                                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                                    </a>

                                    {{-- Contacto rápido (mismo estilo que tu footer) --}}
                                    <a href="mailto:contacto@cidech.com" class="aside-pill">
                                        <span class="material-symbols-outlined text-xl text-primary">mail</span>
                                        <span class="font-black text-gray-900">contacto@cidech.com</span>
                                    </a>

                                    <a href="tel:921810356" class="aside-pill">
                                        <span class="material-symbols-outlined text-xl text-primary">call</span>
                                        <span class="font-black text-gray-900">921 810 356</span>
                                    </a>

                                    <button type="button" class="cta-ghost" onclick="window.scrollTo({top:0, behavior:'smooth'})">
                                        Volver arriba
                                        <span class="material-symbols-outlined text-lg">arrow_upward</span>
                                    </button>
                                </div>
                            </div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
