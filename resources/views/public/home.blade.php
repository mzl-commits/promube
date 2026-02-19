@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
<style>
  /* =========================================================
     PROMUBE UI KIT (HOME)
  ========================================================== */

  :root {
    --brand-red: #ef233c;
    --brand-red-dark: #d61c32;
    --brand-red-light: rgba(239, 35, 60, .10);

    --ink: #0f172a;
    --muted: #64748b;

    --radius-xl: 1.25rem;
    --radius-lg: 1rem;

    --ease-out-expo: cubic-bezier(.19, 1, .22, 1);

    --shadow-soft: 0 18px 35px -22px rgba(15, 23, 42, .35);
    --shadow-red: 0 26px 60px -35px rgba(239, 35, 60, .45);
  }

  .bg-primary { background-color: var(--brand-red) !important; }
  .text-primary { color: var(--brand-red) !important; }
  .border-primary { border-color: var(--brand-red) !important; }

  html { scroll-behavior: smooth; }

  @media (prefers-reduced-motion: reduce) {
    * {
      animation: none !important;
      transition: none !important;
      scroll-behavior: auto !important;
    }
  }

  .no-scrollbar::-webkit-scrollbar { display: none; }
  .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

  /* =========================
     Botones
  ========================== */
  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
    width: auto;
    padding: .875rem 1.15rem;
    border-radius: .85rem;
    font-weight: 800;
    transition: transform .2s ease, background .2s ease, color .2s ease, box-shadow .2s ease, border-color .2s ease;
    user-select: none;
  }

  .btn:focus-visible {
    outline: 2px solid rgba(239, 35, 60, .55);
    outline-offset: 4px;
  }

  .btn-primary {
    background: var(--brand-red);
    color: #fff;
    box-shadow: 0 14px 30px -18px rgba(239, 35, 60, .7);
  }
  .btn-primary:hover {
    background: var(--brand-red-dark);
    transform: translateY(-1px);
  }

  .btn-soft {
    background: rgba(15, 23, 42, .06);
    color: var(--ink);
    border: 1px solid rgba(15, 23, 42, .06);
  }
  .dark .btn-soft {
    background: rgba(255, 255, 255, .08);
    border-color: rgba(255, 255, 255, .08);
    color: #e5e7eb;
  }
  .btn-soft:hover {
    background: var(--brand-red);
    border-color: rgba(239, 35, 60, .55);
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 14px 30px -22px rgba(239, 35, 60, .55);
  }

  /* =========================
     Encabezados de secciones
  ========================== */
  .section-head {
    text-align: center;
    margin-bottom: 2.75rem;
  }

  .section-kicker {
    display: inline-block;
    font-size: .72rem;
    font-weight: 900;
    letter-spacing: .28em;
    text-transform: uppercase;
    color: rgba(239, 35, 60, .95);
  }

  .section-title {
    margin-top: .75rem;
    font-size: clamp(1.8rem, 2vw + 1.2rem, 2.6rem);
    font-weight: 900;
    color: #111827;
  }
  .dark .section-title { color: #fff; }

  .section-line {
    width: 5.5rem;
    height: 4px;
    border-radius: 999px;
    margin: 1rem auto 0;
    background: var(--brand-red);
    box-shadow: 0 10px 28px -18px rgba(239, 35, 60, .9);
  }

  .section-desc {
    margin-top: 1rem;
    font-size: 1.05rem;
    color: #64748b;
    max-width: 46rem;
    margin-inline: auto;
    line-height: 1.6;
  }
  .dark .section-desc { color: rgba(148, 163, 184, .95); }

  .section-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(239, 35, 60, .30), transparent);
    max-width: 1100px;
    margin: 0 auto;
  }

  .animate-fade-in-up { animation: fadeInUp .9s var(--ease-out-expo) both; }
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(18px); filter: blur(6px); }
    to { opacity: 1; transform: translateY(0); filter: blur(0); }
  }

  /* =========================================
     HERO
  ========================================= */
  .hero-wrapper {
    position: relative;
    width: 100%;
    height: calc(100vh - 6rem);
    min-height: 620px;
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
    background-image: radial-gradient(rgba(255, 255, 255, .11) 1px, transparent 1px);
    background-size: 30px 30px;
    opacity: .45;
  }

  .hero-glow {
    position: absolute;
    inset: -30%;
    z-index: 2;
    background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, .18), transparent 55%);
    pointer-events: none;
    opacity: .85;
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
    line-height: .9;
    font-weight: 900;
    color: #fff;
    text-shadow: 0 4px 30px rgba(180, 20, 30, .4);
    margin-bottom: 1.25rem;
    letter-spacing: -.04em;
  }

  .hero-subtitle {
    font-size: clamp(1.15rem, 1.5vw, 1.5rem);
    color: rgba(255, 255, 255, .95);
    font-weight: 400;
    max-width: 600px;
    margin-bottom: 1.75rem;
    line-height: 1.45;
  }

  .hero-actions {
    display: flex;
    gap: .75rem;
    flex-wrap: wrap;
    margin-bottom: 1.25rem;
  }
  .hero-actions .btn { padding: .9rem 1.2rem; border-radius: .9rem; }

  .btn-ghost {
    background: rgba(255, 255, 255, .16);
    border: 1px solid rgba(255, 255, 255, .28);
    color: #fff;
    backdrop-filter: blur(8px);
  }
  .btn-ghost:hover {
    background: rgba(255, 255, 255, .22);
    transform: translateY(-1px);
  }

  .hero-visual-col {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  .hero-main-icon {
    font-size: clamp(15rem, 25vw, 30rem);
    color: rgba(255, 255, 255, .15);
    filter: drop-shadow(0 10px 40px rgba(0, 0, 0, .1));
    animation: floatingLogo 6s ease-in-out infinite;
    transform: rotate(-10deg);
  }

  .typewriter-box {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, .15);
    border: 1px solid rgba(255, 255, 255, .35);
    padding: .8rem 1.25rem;
    border-radius: 14px;
    backdrop-filter: blur(8px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, .10);
    gap: .75rem;
    max-width: 100%;
  }

  .typewriter-label {
    color: rgba(255, 255, 255, .92);
    font-weight: 800;
    text-transform: uppercase;
    font-size: .75rem;
    letter-spacing: .12em;
    white-space: nowrap;
  }

  .typewriter-text {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    font-size: clamp(1rem, 2vw, 1.2rem);
    font-weight: 800;
    color: #fff;
    text-shadow: 0 0 10px rgba(255, 255, 255, .45);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 22rem;
  }

  .cursor {
    width: 3px;
    height: 1.4em;
    background: #fff;
    animation: blink 1s step-end infinite;
  }

  .scroll-indicator {
    position: absolute;
    bottom: 26px;
    left: 50%;
    transform: translateX(-50%);
    color: rgba(255, 255, 255, .7);
    animation: bounce 2s infinite;
    z-index: 20;
    transition: color .3s;
  }
  .scroll-indicator:hover { color: #fff; }

  @media (max-width:1024px) {
    .hero-content { grid-template-columns: 1fr; text-align: center; gap: 1.75rem; }
    .hero-text-col { align-items: center; }
    .hero-visual-col { order: -1; }
    .hero-main-icon { font-size: 12rem; margin-bottom: -2rem; opacity: .3; }
    .hero-actions { justify-content: center; }
    .typewriter-text { max-width: 16rem; }
  }

  @keyframes gradientMove { 0% { background-position: 0% 50% } 100% { background-position: 100% 50% } }
  @keyframes floatingLogo {
    0%,100% { transform: translateY(0) rotate(-5deg) }
    50% { transform: translateY(-20px) rotate(5deg) }
  }
  @keyframes blink { 50% { opacity: 0 } }
  @keyframes bounce {
    0%,20%,50%,80%,100% { transform: translate(-50%, 0) }
    40% { transform: translate(-50%, -10px) }
    60% { transform: translate(-50%, -5px) }
  }

  /* =========================================
     Cards generales
  ========================================= */
  .card {
    background: #fff;
    border-radius: var(--radius-xl);
    border: 1px solid rgba(239, 35, 60, .10);
    transition: transform .35s var(--ease-out-expo), box-shadow .35s var(--ease-out-expo), border-color .35s var(--ease-out-expo);
    overflow: hidden;
    position: relative;
  }
  .dark .card { background: #151515; border-color: rgba(255, 255, 255, .08); }
  .card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-red);
    border-color: rgba(239, 35, 60, .28);
  }

  /* =========================================
     Becas destacadas (mosaico)
  ========================================= */
  .becas-mosaic-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    grid-auto-rows: minmax(240px, 30vh);
    gap: 1.5rem;
    padding: 0 1.5rem;
  }

  .beca-mosaic-card {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-xl);
    background: #000;
    cursor: pointer;
    transform: translateZ(0);
    border: 1px solid rgba(255, 255, 255, .08);
  }

  .beca-mosaic-link { display: block; height: 100%; width: 100%; }

  .beca-mosaic-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .55s var(--ease-out-expo);
    filter: saturate(1.05) contrast(1.02);
  }

  .beca-mosaic-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, .55) 0%, rgba(0, 0, 0, .18) 40%, transparent 70%);
    transition: opacity .35s var(--ease-out-expo), background .35s var(--ease-out-expo);
    opacity: .95;
    z-index: 0;
  }

  .beca-mosaic-body {
    position: absolute;
    inset-inline: 0;
    bottom: 0;
    padding: 1.35rem 1.6rem;
    color: #fff;
    z-index: 1;
    display: flex;
    flex-direction: column;
    gap: .55rem;
  }

  .beca-mosaic-body--center {
    top: 50%;
    bottom: auto;
    transform: translateY(-50%);
  }

  .beca-mosaic-tag {
    display: inline-block;
    padding: .32rem .8rem;
    border-radius: 999px;
    background: rgba(255, 255, 255, .92);
    color: var(--brand-red);
    font-size: .72rem;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .08em;
    width: fit-content;
  }

  .beca-mosaic-title {
    margin: 0;
    font-size: 1.02rem;
    font-weight: 900;
    line-height: 1.2;
    max-width: 26rem;
    opacity: 0;
    transform: translateY(10px);
    max-height: 0;
    overflow: hidden;
    transition: opacity .25s ease, transform .25s ease, max-height .25s ease;
    text-shadow: 0 12px 26px rgba(0, 0, 0, .28);
  }

  .beca-mosaic-card--center { grid-row: span 2; }

  .beca-mosaic-card:hover .beca-mosaic-img { transform: scale(1.06); }

  .beca-mosaic-card:hover .beca-mosaic-overlay {
    background: linear-gradient(to top, rgba(239, 35, 60, .88) 0%, rgba(239, 35, 60, .55) 45%, transparent 75%);
    opacity: 1;
  }

  .beca-mosaic-card:hover .beca-mosaic-title {
    opacity: 1;
    transform: translateY(0);
    max-height: 220px;
  }

  @media (max-width:1024px) {
    .becas-mosaic-grid { grid-template-columns: 1fr 1fr; grid-auto-rows: minmax(220px, 40vh); }
    .beca-mosaic-card--center { grid-row: span 1; }
  }
  @media (max-width:640px) {
    .becas-mosaic-grid { grid-template-columns: 1fr; grid-auto-rows: minmax(220px, 36vh); }
    .beca-mosaic-body--center { top: auto; bottom: 0; transform: none; }
  }

  /* =========================================
     Carrusel Cuadro de Honor (ARREGLADO)
  ========================================= */
  .honor-carousel {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-xl);
  }

  .honor-track {
    display: flex;
    transition: transform .65s var(--ease-out-expo);
    will-change: transform;
  }

  .honor-card-wrap {
    flex: 0 0 100%;
    padding: .5rem;
  }

  @media (min-width: 640px) {
    .honor-card-wrap {
      flex: 0 0 50%;
    }
  }

  @media (min-width: 1024px) {
    .honor-card-wrap {
      flex: 0 0 25%;
    }
  }

  /* Flechas */
  .honor-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    width: 46px;
    height: 46px;
    border-radius: 999px;
    border: 0;
    cursor: pointer;
    display: grid;
    place-items: center;
    background: rgba(255,255,255,.92);
    box-shadow: 0 20px 40px -22px rgba(0,0,0,.35);
    transition: transform .2s ease, background .2s ease, opacity .2s ease;
  }

  .honor-arrow:hover {
    transform: translateY(-50%) scale(1.06);
    background: var(--brand-red);
    color: white;
  }

  .honor-arrow:disabled {
    opacity: .35;
    cursor: not-allowed;
    transform: translateY(-50%) scale(1);
    background: rgba(255,255,255,.8);
    color: #333;
  }

  .honor-arrow-left { left: 12px; }
  .honor-arrow-right { right: 12px; }

  /* Dots */
  .honor-dots {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
    gap: .5rem;
  }

  .honor-dot {
    width: 10px;
    height: 10px;
    border-radius: 999px;
    background: #e5e7eb;
    cursor: pointer;
    border: 0;
    transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
  }

  .dark .honor-dot { background: #333; }

  .honor-dot.is-active {
    background: var(--brand-red);
    transform: scale(1.25);
    box-shadow: 0 0 0 6px rgba(239, 35, 60, .12);
  }

  /* Tarjeta alumno */
  .student-card {
    position: relative;
    overflow: hidden;
    transform: translateZ(0);
    transition: transform .35s var(--ease-out-expo), box-shadow .35s var(--ease-out-expo), border-color .35s var(--ease-out-expo);
  }

  .student-card::before {
    content: "";
    position: absolute;
    inset: -2px;
    background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, .25) 15%, transparent 35%);
    transform: translateX(-120%);
    transition: transform .7s var(--ease-out-expo);
    pointer-events: none;
  }

  .student-card::after {
    content: "";
    position: absolute;
    inset: -40%;
    background: radial-gradient(circle, rgba(239, 35, 60, .20) 0%, transparent 55%);
    opacity: 0;
    transition: opacity .35s var(--ease-out-expo);
    pointer-events: none;
  }

  .student-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-red);
    border-color: rgba(239, 35, 60, .28);
  }

  .student-card:hover::before { transform: translateX(120%); }
  .student-card:hover::after { opacity: 1; }

  .dark .student-card::before {
    background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, .10) 15%, transparent 35%);
  }

  /* =========================================
     Sedes
  ========================================= */
  .location-card { display: flex; flex-direction: column; height: 100%; }

  .location-image-container {
    height: 16rem;
    overflow: hidden;
    position: relative;
  }

  .location-card img {
    transition: .7s var(--ease-out-expo);
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .location-card:hover img { transform: scale(1.08); }

  .chip-city {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(255, 255, 255, .90);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(15, 23, 42, .08);
    padding: .35rem .85rem;
    border-radius: 999px;
    font-size: .75rem;
    font-weight: 900;
    color: var(--brand-red);
  }

  .dark .chip-city {
    background: rgba(10, 10, 10, .60);
    border-color: rgba(255, 255, 255, .10);
    color: #fff;
  }

  .sede-icon {
    width: 3.5rem;
    height: 3.5rem;
    background-color: var(--brand-red-light);
    border-radius: 999px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-red);
    transition: all .3s ease;
  }

  .location-card:hover .sede-icon {
    background-color: var(--brand-red);
    color: #fff;
    transform: scale(1.08);
    box-shadow: 0 18px 36px -26px rgba(239, 35, 60, .95);
  }

  .section-pad {
    padding-top: 5rem;
    padding-bottom: 5rem;
  }
  @media (min-width: 768px) {
    .section-pad {
      padding-top: 5.5rem;
      padding-bottom: 5.5rem;
    }
  }

  .divider-pad {
    margin-top: .5rem;
    margin-bottom: .5rem;
  }
</style>


{{-- =========================================================
    1) HERO
========================================================== --}}
<div class="hero-wrapper">
  <div class="hero-bg-css"></div>
  <div class="hero-pattern"></div>
  <div class="hero-glow"></div>

  <div class="hero-content animate-fade-in-up">
    <div class="hero-text-col">
      <h1 class="hero-title">PROMUBE</h1>
      <p class="hero-subtitle">
        Promoción de Becas y Programas Educativos.<br>
        El futuro está en tus manos.
      </p>

      <div class="hero-actions">
        <a href="#becas" class="btn btn-primary">
          Explorar becas
          <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </a>
        <a href="{{ route('becas.index') }}" class="btn btn-ghost">
          Ver catálogo
          <span class="material-symbols-outlined text-lg">grid_view</span>
        </a>
      </div>

      <div class="typewriter-box">
        <span class="typewriter-label">CONVOCATORIAS</span>
        <span id="typewriter-text" class="typewriter-text"></span>
        <span class="cursor"></span>
      </div>
    </div>

    <div class="hero-visual-col">
      <span class="material-symbols-outlined hero-main-icon">school</span>
    </div>
  </div>

  <a href="#becas" class="scroll-indicator" aria-label="Bajar a Becas destacadas">
    <span class="material-symbols-outlined text-5xl">keyboard_arrow_down</span>
  </a>
</div>


{{-- =========================================================
    2) BECAS DESTACADAS
========================================================== --}}
<section id="becas" class="section-pad bg-white dark:bg-[#0a0a0a] overflow-hidden">
  <div class="mx-auto px-0">
    <div class="section-head px-6">
      <span class="section-kicker">Oportunidades</span>
      <h2 class="section-title">Becas destacadas</h2>
      <div class="section-line"></div>
      <p class="section-desc">
        Selección de convocatorias con alta demanda y excelentes oportunidades de desarrollo.
      </p>
    </div>

    <div class="becas-mosaic-grid">
      <article class="beca-mosaic-card">
        <a class="beca-mosaic-link group" href="{{ route('becas.show', 'beca-bcp') }}">
          <img loading="lazy" src="{{ asset('img/becas/beca-bcp.png') }}" alt="Beca BCP" class="beca-mosaic-img">
          <div class="beca-mosaic-overlay"></div>
          <div class="beca-mosaic-body">
            <span class="beca-mosaic-tag">Beca BCP</span>
            <h3 class="beca-mosaic-title">Beca para potenciar tu talento con acompañamiento integral.</h3>
          </div>
        </a>
      </article>

      <article class="beca-mosaic-card beca-mosaic-card--center">
        <a class="beca-mosaic-link group" href="{{ route('becas.show', 'beca-18') }}">
          <img loading="lazy" src="{{ asset('img/becas/beca-18.png') }}" alt="Beca 18" class="beca-mosaic-img">
          <div class="beca-mosaic-overlay"></div>
          <div class="beca-mosaic-body beca-mosaic-body--center">
            <span class="beca-mosaic-tag">Beca 18</span>
            <h3 class="beca-mosaic-title">Excelencia académica para talentos de todo el país.</h3>
          </div>
        </a>
      </article>

      <article class="beca-mosaic-card">
        <a class="beca-mosaic-link group" href="{{ route('becas.show', 'beca-tecsup') }}">
          <img loading="lazy" src="{{ asset('img/becas/beca-tecsup.png') }}" alt="Beca Tecsup" class="beca-mosaic-img">
          <div class="beca-mosaic-overlay"></div>
          <div class="beca-mosaic-body">
            <span class="beca-mosaic-tag">Beca Tecsup</span>
            <h3 class="beca-mosaic-title">Formación tecnológica en carreras con alta demanda laboral.</h3>
          </div>
        </a>
      </article>

      <article class="beca-mosaic-card">
        <a class="beca-mosaic-link group" href="{{ route('becas.show', 'beca-ferreyros') }}">
          <img loading="lazy" src="{{ asset('img/Beca-Ferreyros.png') }}" alt="Beca Ferreyros" class="beca-mosaic-img">
          <div class="beca-mosaic-overlay"></div>
          <div class="beca-mosaic-body">
            <span class="beca-mosaic-tag">Beca Ferreyros</span>
            <h3 class="beca-mosaic-title">Especialización en industria y maquinaria de alto impacto.</h3>
          </div>
        </a>
      </article>

      <article class="beca-mosaic-card">
        <a class="beca-mosaic-link group" href="{{ route('becas.show', 'beca-uni') }}">
          <img loading="lazy" src="{{ asset('img/becas/beca-uni.png') }}" alt="Beca UNI" class="beca-mosaic-img">
          <div class="beca-mosaic-overlay"></div>
          <div class="beca-mosaic-body">
            <span class="beca-mosaic-tag">Beca UNI</span>
            <h3 class="beca-mosaic-title">Para estudios en ingeniería y ciencias en la UNI.</h3>
          </div>
        </a>
      </article>
    </div>

    <div class="mt-12 px-6 flex justify-center">
      <a href="{{ route('becas.index') }}" class="btn btn-soft">
        Ver todas las becas
        <span class="material-symbols-outlined text-lg">arrow_forward</span>
      </a>
    </div>
  </div>
</section>

<div class="section-divider divider-pad"></div>


{{-- =========================================================
    3) MUNICIPALIDADES
========================================================== --}}
<section class="section-pad bg-gray-50 dark:bg-[#0f0f0f]">
  <div class="container mx-auto px-6">
    <div class="section-head">
      <span class="section-kicker">Alianzas</span>
      <h2 class="section-title">Aliados Estratégicos</h2>
      <div class="section-line"></div>
      <p class="section-desc">Colaboramos con gobiernos locales para impulsar oportunidades educativas.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
      <div class="card p-8 text-center">
        <img class="mx-auto w-28 h-28 object-contain mb-4"
             src="{{ asset('img/aliados/escudo_municipalidad_cairani_tacna.jpg') }}" alt="Escudo Cairani">
        <h3 class="text-xl font-black">Muni. Cairani</h3>
        <p class="text-sm mt-3 text-gray-600 dark:text-gray-300">
          <strong>Alcalde:</strong> Tito Mamani Mamani <br><br>
          Cooperación para fortalecer el desarrollo agrícola e hídrico en Candarave.
        </p>
      </div>

      <div class="card p-8 text-center">
        <img class="mx-auto w-28 h-28 object-contain mb-4"
             src="{{ asset('img/aliados/escudo_municipalidad_choco_arequipa.jpg') }}" alt="Escudo Choco">
        <h3 class="text-xl font-black">Muni. Choco</h3>
        <p class="text-sm mt-3 text-gray-600 dark:text-gray-300">
          <strong>Alcaldesa:</strong> Eva Elizabeth Chura Quicaña <br><br>
          Impulsamos oportunidades para familias agricultoras y ganaderas.
        </p>
      </div>

      <div class="card p-8 text-center">
        <img class="mx-auto w-28 h-28 object-contain mb-4"
             src="{{ asset('img/aliados/escudo_municipalidad_lasyaras_tacna.jpg') }}" alt="Escudo Sama">
        <h3 class="text-xl font-black">Muni. Sama</h3>
        <p class="text-sm mt-3 text-gray-600 dark:text-gray-300">
          <strong>Alcalde:</strong> Richard Santos Calizaya Pimentel <br><br>
          Alianza para fortalecer agricultura, turismo e identidad cultural.
        </p>
      </div>

      <div class="card p-8 text-center">
        <img class="mx-auto w-28 h-28 object-contain mb-4"
             src="{{ asset('img/aliados/escudo_municipalidad_palca_tacna.jpg') }}" alt="Escudo Palca">
        <h3 class="text-xl font-black">Muni. Palca</h3>
        <p class="text-sm mt-3 text-gray-600 dark:text-gray-300">
          <strong>Alcalde:</strong> Toribio Zanga Onofre <br><br>
          Proyectos para bienestar social y mejoras de infraestructura.
        </p>
      </div>
    </div>
  </div>
</section>

<div class="section-divider divider-pad"></div>


{{-- =========================================================
    4) CUADRO DE HONOR (CARRUSEL ARREGLADO)
========================================================== --}}
<section class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 py-12 lg:py-20">
  <div class="max-w-7xl mx-auto px-4">

    <!-- TÍTULO -->
    <div class="text-center mb-10">
      <span class="bg-primary text-white text-xs tracking-wider font-bold py-1 px-4 inline-block mb-2">
        CUADRO DE HONOR 2026
      </span>

      <h2 class="text-4xl sm:text-5xl font-extrabold">
        INGRESANTES<span class="text-primary"></span>
      </h2>

      <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 uppercase tracking-wide">
        Excelencia académica y resultados sólidos en las mejores instituciones.
      </p>
    </div>

    <!-- CARRUSEL -->
    <div class="honor-carousel">

      <!-- Flecha izquierda -->
      <button id="honor-prev" class="honor-arrow honor-arrow-left" aria-label="Anterior">
        <span class="material-symbols-outlined">chevron_left</span>
      </button>

      <!-- Flecha derecha -->
      <button id="honor-next" class="honor-arrow honor-arrow-right" aria-label="Siguiente">
        <span class="material-symbols-outlined">chevron_right</span>
      </button>

      <!-- TRACK -->
      <div id="honor-track" class="honor-track">

        <!-- Tarjeta 1 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="img/historias/keler.png"
                alt="Carlos Mendoza Ruiz" class="w-full h-full object-cover" />
              <div class="absolute top-1 left-1 bg-primary text-white text-xs font-bold px-2 py-1 uppercase tracking-wider">
                1er puesto UNI
              </div>
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Miranda Condori Keller</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span>Ingeniería Petroquímica 
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span>UNI
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span>1er puesto (IEN-UNI-2025)
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="img/historias/benjamin.png"
                alt="Andrea Solís Vega" class="w-full h-full object-cover" />
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Navarro Loyola Benjamin</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span> Ingeniería Química
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span> UNI
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span>1er puesto
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="img/historias/fabricio.png"
                alt="Ricardo Alva Paz" class="w-full h-full object-cover" />
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Noa Ccallo Fabrizio</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span>Ingeniería de Ciberseguridad
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span>UNI
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span> 1er Puesto Fac.
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 4 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="img/historias/walter.png"
                alt="Lucía Torres Luna" class="w-full h-full object-cover" />
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Alcantara Quispe Walter</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span> Ingeniería Ambiental
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span> UPCH
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span> Ingresante a la UPCH
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 5 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="img/historias/milton_ccota.png"
                alt="María Quispe" class="w-full h-full object-cover" />
              <div class="absolute top-1 left-1 bg-primary text-white text-xs font-bold px-2 py-1 uppercase tracking-wider">
                INGRESANTE IEN-2026
              </div>
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Milton Ccota Mamani</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span> Ingeniería Civil
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span> UNI
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span> IEN-2026 
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 6 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="img/historias/alex_gallegos.png"
                alt="Daniel Ramos" class="w-full h-full object-cover" />
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Alex Gallegos Humire</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span> Ingeniería Química
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span> UNI
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span> 1er puesto (IEN-2026)
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 7 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="  "
                alt="José Castillo" class="w-full h-full object-cover" />
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">José Castillo</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span> Economía
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span> UNMSM
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span> 3er Puesto
              </p>
            </div>
          </div>
        </div>

        <!-- Tarjeta 8 -->
        <div class="honor-card-wrap">
          <div class="student-card bg-white dark:bg-slate-900 rounded-xl shadow-md overflow-hidden border border-slate-100 dark:border-slate-800">
            <div class="relative aspect-square bg-slate-200">
              <img src="   "
                alt="Paola Rivas" class="w-full h-full object-cover" />
            </div>
            <div class="p-4 text-center">
              <h3 class="font-bold text-lg text-slate-900 dark:text-white">Paola Rivas</h3>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">school</span> Administración
              </p>
              <p class="text-xs text-slate-500 uppercase tracking-wide flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">account_balance</span> UPC
              </p>
              <p class="text-xs text-primary uppercase font-bold tracking-wider flex justify-center items-center gap-1">
                <span class="material-symbols-outlined text-base">emoji_events</span> 1er Puesto
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- DOTS -->
    <div id="honor-dots" class="honor-dots"></div>

  </div>
</section>


{{-- =========================================================
    5) SEDES
========================================================== --}}
<section class="section-pad bg-gray-50 dark:bg-[#0a0a0a]">
  <div class="container mx-auto px-6">
    <div class="section-head">
      <span class="section-kicker">Oficinas</span>
      <h2 class="section-title">Nuestras Sedes</h2>
      <div class="section-line"></div>
      <p class="section-desc">Visítanos o comunícate con la sede más cercana.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <div class="card location-card group">
        <div class="location-image-container">
          <img loading="lazy" alt="Sede Arequipa" src="{{ asset('img/sedes/sede_arequipa.png') }}" />
          <div class="chip-city">Arequipa</div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <div class="flex items-center gap-4 mb-6">
            <div class="sede-icon">
              <span class="material-symbols-outlined text-2xl">apartment</span>
            </div>
            <h3 class="text-2xl font-black text-gray-900 dark:text-white">Sede Arequipa</h3>
          </div>

          <div class="space-y-4 mb-8">
            <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg mt-1 text-gray-400">location_on</span>
              <span class="text-sm">C. Sanchez Trujillo 240, Miraflores 04004, Arequipa.</span>
            </div>
            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg text-gray-400">schedule</span>
              <span class="text-sm">Lun-Vie, 9:00 AM - 6:00 PM</span>
            </div>
            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg text-gray-400">call</span>
              <span class="text-sm font-bold">931 315 933</span>
            </div>
          </div>

          <a href="{{ route('sedes.index') }}#arequipa" class="btn btn-soft w-full mt-auto">
            Ver mapa
            <span class="material-symbols-outlined text-lg">map</span>
          </a>
        </div>
      </div>

      <div class="card location-card group">
        <div class="location-image-container">
          <img loading="lazy" alt="Sede Tacna" src="{{ asset('img/sedes/sede_tacna.jpg') }}" />
          <div class="chip-city">Tacna</div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <div class="flex items-center gap-4 mb-6">
            <div class="sede-icon">
              <span class="material-symbols-outlined text-2xl">business</span>
            </div>
            <h3 class="text-2xl font-black text-gray-900 dark:text-white">Sede Tacna</h3>
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
              <span class="text-sm">Lun-Vie, 8:00 AM - 1:00 PM y 3:00 PM - 6:00 PM</span>
            </div>
            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg text-gray-400">call</span>
              <span class="text-sm font-bold">921 810 356</span>
            </div>
          </div>

          <a href="{{ route('sedes.index') }}#tacna" class="btn btn-soft w-full mt-auto">
            Ver mapa
            <span class="material-symbols-outlined text-lg">map</span>
          </a>
        </div>
      </div>

      <div class="card location-card group">
        <div class="location-image-container">
          <img loading="lazy" alt="Sede Lima" src="{{ asset('img/sedes/sede_lima.jpg') }}" />
          <div class="chip-city">Lima</div>
        </div>

        <div class="p-8 flex flex-col flex-grow">
          <div class="flex items-center gap-4 mb-6">
            <div class="sede-icon">
              <span class="material-symbols-outlined text-2xl">location_city</span>
            </div>
            <h3 class="text-2xl font-black text-gray-900 dark:text-white">Sede Lima</h3>
          </div>

          <div class="space-y-4 mb-8">
            <div class="flex items-start gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg mt-1 text-gray-400">location_on</span>
              <span class="text-sm">Av. Honorio Delgado 169, San Martín de Porres 15102.</span>
            </div>
            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg text-gray-400">schedule</span>
              <span class="text-sm">Lun-Vie, 9:00 AM - 6:00 PM</span>
            </div>
            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg text-gray-400">call</span>
              <span class="text-sm font-bold">976 156 196</span>
            </div>
          </div>

          <a href="{{ route('sedes.index') }}#lima" class="btn btn-soft w-full mt-auto">
            Ver mapa
            <span class="material-symbols-outlined text-lg">map</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


{{-- =========================================================
    Script Carrusel (ARREGLADO: páginas 4 y 4)
========================================================== --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
  const track = document.getElementById("honor-track");
  const prev = document.getElementById("honor-prev");
  const next = document.getElementById("honor-next");
  const dotsContainer = document.getElementById("honor-dots");

  if (!track || !prev || !next || !dotsContainer) return;

  const slides = Array.from(track.children);

  let pageIndex = 0;
  let slidesPerView = 4;

  function updateSlidesPerView() {
    if (window.innerWidth >= 1024) {
      slidesPerView = 4; 
    } else if (window.innerWidth >= 640) {
      slidesPerView = 2;
    } else {
      slidesPerView = 1;
    }
  }

  function getTotalPages() {
    return Math.ceil(slides.length / slidesPerView);
  }

  function updateTrackPosition() {
    const slideWidth = slides[0].offsetWidth;
    const moveX = pageIndex * slidesPerView * slideWidth;
    track.style.transform = `translateX(-${moveX}px)`;
  }

  function renderDots() {
    const totalPages = getTotalPages();

    dotsContainer.innerHTML = "";

    for (let i = 0; i < totalPages; i++) {
      const dot = document.createElement("button");
      dot.className = "honor-dot" + (i === pageIndex ? " is-active" : "");

      dot.addEventListener("click", () => {
        pageIndex = i;
        updateCarousel();
      });

      dotsContainer.appendChild(dot);
    }
  }

  function updateButtons() {
    const totalPages = getTotalPages();
    prev.disabled = pageIndex <= 0;
    next.disabled = pageIndex >= totalPages - 1;
  }

  function updateCarousel() {
    updateSlidesPerView();

    const totalPages = getTotalPages();

    if (pageIndex < 0) pageIndex = 0;
    if (pageIndex > totalPages - 1) pageIndex = totalPages - 1;

    updateTrackPosition();
    renderDots();
    updateButtons();
  }

  prev.addEventListener("click", () => {
    pageIndex--;
    updateCarousel();
  });

  next.addEventListener("click", () => {
    pageIndex++;
    updateCarousel();
  });

  window.addEventListener("resize", () => {
    updateCarousel();
  });

  updateCarousel();
});
</script>


{{-- =========================================================
    Script Typewriter HERO
========================================================== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const textElement = document.getElementById('typewriter-text');
  const phrases = [
    "Beca Tecsup",
    "Beca Cayetano Heredia",
    "Beca Ferreyros",
    "Beca BCP",
    "Beca UNI",
    "Beca San Marcos"
  ];

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
      setTimeout(type, 1700);
    } else if (isDeleting && charIndex === 0) {
      isDeleting = false;
      phraseIndex = (phraseIndex + 1) % phrases.length;
      setTimeout(type, 350);
    } else {
      setTimeout(type, isDeleting ? 45 : 85);
    }
  }

  if (textElement) type();
});
</script>

@endsection
