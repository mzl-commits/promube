@extends('layouts.public')

@section('title', 'Catálogo de Becas - PROMUBE')

@section('content')
<style>
  /* =========================================
     PROMUBE THEME (match Home)
  ========================================= */
  :root{
    --brand-red:#ef233c;
    --brand-red-light:rgba(239,35,60,.10);
    --brand-red-glow:rgba(239,35,60,.22);
    --ease-out-expo:cubic-bezier(.19,1,.22,1);
  }

  /* helpers (igual que Home) */
  .text-primary{ color:var(--brand-red)!important; }
  .bg-primary{ background-color:var(--brand-red)!important; }
  .border-primary{ border-color:var(--brand-red)!important; }

  /* clamp fallback si no tienes plugin line-clamp */
  .line-clamp-3{
    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;
    overflow:hidden;
  }

  /* =========================================
     MINI HERO (PROMUBE RED)
  ========================================= */
  .page-header{
    position:relative;
    overflow:hidden;
    border-radius:1.5rem;
    padding:4.2rem 2rem;
    text-align:center;
    margin-top:1.25rem;
    margin-bottom:3.5rem;
    background:linear-gradient(135deg,#ff4d63 0%,#ef233c 50%,#d61c32 100%);
    background-size:200% 200%;
    animation:gradientMove 12s ease infinite alternate;
    box-shadow:0 26px 60px -30px rgba(0,0,0,.35);
  }
  .page-header::before{
    content:"";
    position:absolute;
    inset:0;
    opacity:.35;
    background-image:radial-gradient(rgba(255,255,255,.14) 1px, transparent 1px);
    background-size:30px 30px;
  }
  .page-header::after{
    content:"";
    position:absolute;
    inset:-40%;
    background:radial-gradient(circle, rgba(255,255,255,.18) 0%, transparent 55%);
    transform:translateY(10%);
    opacity:.9;
    pointer-events:none;
  }
  .page-header .hero-icon{
    position:absolute;
    right:-20px;
    top:-10px;
    font-size:14rem;
    color:rgba(255,255,255,.16);
    transform:rotate(-10deg);
    filter:drop-shadow(0 20px 60px rgba(0,0,0,.12));
    pointer-events:none;
  }
  @keyframes gradientMove{
    0%{background-position:0% 50%}
    100%{background-position:100% 50%}
  }

  /* =========================================
     CARDS (match location/partner style)
  ========================================= */
  .beca-card{
    background:#fff;
    border-radius:1.25rem;
    overflow:hidden;
    border:1px solid rgba(239,35,60,.10);
    transition:transform .4s var(--ease-out-expo),
               box-shadow .4s var(--ease-out-expo),
               border-color .4s var(--ease-out-expo);
    display:flex;
    flex-direction:column;
    height:100%;
    position:relative;
    transform:translateZ(0);
  }
  .dark .beca-card{
    background:#151515;
    border-color:rgba(255,255,255,.06);
  }

  /* brillo tipo "premium" como tus student-cards */
  .beca-card::before{
    content:"";
    position:absolute;
    inset:-2px;
    background:linear-gradient(120deg, transparent 0%, rgba(255,255,255,.22) 15%, transparent 35%);
    transform:translateX(-120%);
    transition:transform .7s var(--ease-out-expo);
    pointer-events:none;
    z-index:0;
  }
  .beca-card::after{
    content:"";
    position:absolute;
    inset:-40%;
    background:radial-gradient(circle, var(--brand-red-glow) 0%, transparent 55%);
    opacity:0;
    transition:opacity .35s var(--ease-out-expo);
    pointer-events:none;
    z-index:0;
  }

  .beca-card:hover{
    transform:translateY(-8px);
    box-shadow:0 26px 60px -35px rgba(239,35,60,.45);
    border-color:rgba(239,35,60,.28);
  }
  .beca-card:hover::before{ transform:translateX(120%); }
  .beca-card:hover::after{ opacity:1; }

  .beca-image-wrapper{
    position:relative;
    height:230px;
    overflow:hidden;
  }
  .beca-image{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .7s var(--ease-out-expo);
  }
  .beca-card:hover .beca-image{ transform:scale(1.08); }

  .beca-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.62) 0%, rgba(0,0,0,0) 70%);
    opacity:.85;
  }

  .badge-category{
    position:absolute;
    top:1rem;
    right:1rem;
    background:rgba(255,255,255,.92);
    color:var(--brand-red);
    font-size:.75rem;
    font-weight:800;
    padding:.35rem .85rem;
    border-radius:9999px;
    box-shadow:0 10px 25px rgba(0,0,0,.10);
    backdrop-filter:blur(6px);
    z-index:10;
    border:1px solid rgba(239,35,60,.18);
  }
  .dark .badge-category{
    background:rgba(21,21,21,.80);
    color:#fff;
    border-color:rgba(255,255,255,.10);
  }

  .badge-level{
    display:inline-flex;
    align-items:center;
    gap:.35rem;
    font-size:.75rem;
    font-weight:700;
    color:#fff;
    background:rgba(0,0,0,.28);
    backdrop-filter:blur(6px);
    border:1px solid rgba(255,255,255,.22);
    padding:.25rem .55rem;
    border-radius:9999px;
  }

  .btn-card{
    margin-top:auto;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:100%;
    padding:.95rem;
    border-radius:.85rem;
    background:#f3f4f6;
    color:#111827;
    font-weight:800;
    transition:background .25s ease, color .25s ease, transform .25s ease, box-shadow .25s ease;
  }
  .dark .btn-card{
    background:#262626;
    color:#e5e7eb;
  }
  .beca-card:hover .btn-card{
    background:var(--brand-red);
    color:#fff;
    box-shadow:0 16px 30px -18px rgba(239,35,60,.65);
  }
  .btn-card .arrow{
    transition:transform .25s ease;
  }
  .beca-card:hover .btn-card .arrow{
    transform:translateX(4px);
  }
</style>

{{-- HEADER DE LA PÁGINA --}}
<section class="container mx-auto px-4 sm:px-6">
  <div class="page-header">
    <span class="material-symbols-outlined hero-icon">school</span>

    <div class="relative z-10">
      <span class="inline-flex items-center gap-2 bg-white/15 text-white font-bold tracking-widest uppercase text-xs mb-3 px-3 py-1 rounded-full border border-white/25 backdrop-blur">
        <span class="material-symbols-outlined text-sm">campaign</span>
        Oportunidades Educativas
      </span>

      <h1 class="text-3xl md:text-5xl font-black text-white mb-4">
        Catálogo de Becas
      </h1>

      <p class="text-white/90 max-w-2xl mx-auto text-lg font-light">
        Explora convocatorias y programas que impulsan tu crecimiento académico y profesional.
      </p>
    </div>
  </div>
</section>

{{-- GRID DE BECAS --}}
<section class="container mx-auto px-4 sm:px-6 pb-24">
  @php
    $imagenes = [
      'https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE',
      'https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY',
      'https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw',
      'https://lh3.googleusercontent.com/aida-public/AB6AXuAqsDW7Eyzl38NxtWzXWj9ZPNb9fnfDkRhiSR5ugftDifvRlgtJRrJgnObPxcDYoKv0hx6cghdStc9Rr8w-H_A5ixsXT1LSeMWXrD727ymKaPh_kk7h-Ul2txlr3zTIgf806_eYucfUe1WRUPIxzgoca2dwJHdAgu9x0gwM-QgJtuydonoDwuv31yLaQ5D5fpDyKZdATqfnn6BK_1dOlv3YKPsKjv_pCf62uLtgJibEcgS32AoV8eOVKyXEaq1D6g3znWc1vivIYjw',
      'https://lh3.googleusercontent.com/aida-public/AB6AXuB6zVY2V16CGVuc4WNtxW-GpEd3MpEU1wyTOHuWQqEgHLzwbqf05yKK3k2nBdug7uncLU64WSj5tlCmtB_4zAa0TiOYhNJWNkamFFRtRtOPugWEwkMV5iWP9FcOPeoA1je-V16kb-LWsntI2zf-P0JW3iViyI23Qj_9_uLkihF-bJ6LRzwkg-ocWZzwb0uaCBhESle3HTNAlj4yMaN_PVDw0V8m09VsLeocoJyw-DJqyy8w0FgdKOda0MhoY0rOYbNfRIB3iojjyE',
      'https://lh3.googleusercontent.com/aida-public/AB6AXuBg8PymSKI3WqL0j_KJBDo7DgRCwApkez7oMNJ-4DXE0870OQlrDSnJ-oTFCXGT0cnbmhkHAvtgHlfVMfssGaBLKqpobcgKNNh2Z0IwiYk1J9D29_csvV7aoFllZJgqD3ipRx806mX4LLAbRP_YeMqYp03QIlHvUHfh5thXRHFcUb8VfuqVurY6dlSoOnolpLWFcgBCFLvniImMuDxAGPw4-g4W3bgYF4T3GYlhKK3tyw9LHGi5sIYKOKViLgZbIJzYKCY-3hbzraQ'
    ];
  @endphp

  @if($becas->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($becas as $index => $beca)
        @php
          $imgSrc = $beca->imagen_portada
            ? (Str::startsWith($beca->imagen_portada, ['http://', 'https://'])
              ? $beca->imagen_portada
              : asset($beca->imagen_portada))
            : $imagenes[$index % count($imagenes)];
        @endphp

        <article class="beca-card group">
          {{-- Imagen + Badges --}}
          <div class="beca-image-wrapper">

            <img src="{{ $imgSrc }}" alt="{{ $beca->titulo ?? $beca->nombre }}" class="beca-image">
            <div class="beca-overlay"></div>

            <div class="absolute bottom-4 left-4 z-10 flex flex-wrap gap-2">
              <span class="badge-level">
                <span class="material-symbols-outlined text-sm">school</span>
                {{ $beca->nivel ?? 'Pregrado' }}
              </span>

              <span class="badge-level">
                <span class="material-symbols-outlined text-sm">pin_drop</span>
                {{ $beca->pais ?? 'Perú' }}
              </span>
            </div>
          </div>

          {{-- Contenido --}}
          <div class="relative z-10 p-6 flex flex-col flex-grow">
            <div class="mb-4">
              <h3 class="text-xl font-extrabold text-gray-900 dark:text-white mb-2 leading-tight group-hover:text-primary transition-colors">
                {{ $beca->titulo ?? $beca->nombre }}
              </h3>

              <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold flex items-center gap-2">
                <span class="material-symbols-outlined text-base text-gray-400">location_on</span>
                {{ $beca->modalidad ?? 'Presencial' }} <span class="text-gray-400">•</span> {{ $beca->pais ?? 'Perú' }}
              </p>
            </div>

            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-6 line-clamp-3">
              {{ $beca->resumen ?? Str::limit($beca->descripcion, 120) }}
            </p>

            {{-- Botón --}}
            <a href="{{ route('becas.show', $beca->slug) }}" class="btn-card">
              Ver convocatoria
              <span class="material-symbols-outlined ml-2 text-lg arrow">arrow_forward</span>
            </a>
          </div>
        </article>
      @endforeach
    </div>
    
    <div class="mt-8 flex justify-center w-full">
      {{ $becas->links() }}
    </div>
  @else
    {{-- Estado vacío --}}
    <div class="text-center py-20 bg-gray-50 dark:bg-[#151515] rounded-2xl border border-dashed border-gray-300 dark:border-white/10">
      <div class="bg-gray-100 dark:bg-[#202020] rounded-full p-4 w-20 h-20 mx-auto mb-6 flex items-center justify-center">
        <span class="material-symbols-outlined text-4xl text-gray-400">search_off</span>
      </div>
      <h3 class="text-xl font-extrabold text-gray-900 dark:text-white mb-2">No hay becas disponibles</h3>
      <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">
        Actualmente no tenemos convocatorias abiertas. Por favor, revisa más tarde.
      </p>

      <a href="{{ route('home') }}" class="mt-6 inline-flex items-center font-extrabold text-primary hover:underline">
        <span class="material-symbols-outlined mr-1">arrow_back</span>
        Volver al inicio
      </a>
    </div>
  @endif
</section>
@endsection
