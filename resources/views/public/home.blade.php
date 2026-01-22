@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
  <style>
    /* =========================================================
        PROMUBE UI KIT (HOME) — coherente con el resto del sitio
      ========================================================= */
    :root {
      --brand-red: #ef233c;
      --brand-red-dark: #d61c32;
      --brand-red-light: rgba(239, 35, 60, .10);

      --ink: #0f172a;
      --muted: #64748b;

      --radius-xl: 1.25rem;
      /* 20px */
      --radius-lg: 1rem;
      /* 16px */

      --ease-out-expo: cubic-bezier(.19, 1, .22, 1);

      --shadow-soft: 0 18px 35px -22px rgba(15, 23, 42, .35);
      --shadow-red: 0 26px 60px -35px rgba(239, 35, 60, .45);
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

    html {
      scroll-behavior: smooth;
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation: none !important;
        transition: none !important;
        scroll-behavior: auto !important;
      }
    }

    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    /* =========================
        BOTONES (consistencia)
      ========================= */
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
        TÍTULOS DE SECCIÓN (firma)
      ========================= */
    .section-head {
      text-align: center;
      margin-bottom: 4rem;
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

    .dark .section-title {
      color: #fff;
    }

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

    .dark .section-desc {
      color: rgba(148, 163, 184, .95);
    }

    .section-divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(239, 35, 60, .30), transparent);
      max-width: 1100px;
      margin: 0 auto;
    }

    /* =========================
        ANIMACIÓN SUAVE HOME
      ========================= */
    .animate-fade-in-up {
      animation: fadeInUp .9s var(--ease-out-expo) both;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(18px);
        filter: blur(6px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
      }
    }

    /* =========================================
        1) HERO (split) — ya lo tenías, lo pulimos
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
      filter: blur(0);
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

    .hero-actions .btn {
      padding: .9rem 1.2rem;
      border-radius: .9rem;
    }

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

    .scroll-indicator:hover {
      color: #fff;
    }

    @media (max-width:1024px) {
      .hero-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 1.75rem;
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
        opacity: .3;
      }

      .hero-actions {
        justify-content: center;
      }

      .typewriter-text {
        max-width: 16rem;
      }
    }

    @keyframes gradientMove {
      0% {
        background-position: 0% 50%
      }

      100% {
        background-position: 100% 50%
      }
    }

    @keyframes floatingLogo {

      0%,
      100% {
        transform: translateY(0) rotate(-5deg)
      }

      50% {
        transform: translateY(-20px) rotate(5deg)
      }
    }

    @keyframes blink {
      50% {
        opacity: 0
      }
    }

    @keyframes bounce {

      0%,
      20%,
      50%,
      80%,
      100% {
        transform: translate(-50%, 0)
      }

      40% {
        transform: translate(-50%, -10px)
      }

      60% {
        transform: translate(-50%, -5px)
      }
    }

    /* =========================================
        2) CARDS GENERALES (unificar)
      ========================================= */
    .card {
      background: #fff;
      border-radius: var(--radius-xl);
      border: 1px solid rgba(239, 35, 60, .10);
      transition: transform .35s var(--ease-out-expo), box-shadow .35s var(--ease-out-expo), border-color .35s var(--ease-out-expo);
      overflow: hidden;
      position: relative;
    }

    .dark .card {
      background: #151515;
      border-color: rgba(255, 255, 255, .08);
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-red);
      border-color: rgba(239, 35, 60, .28);
    }

    /* Partner */
    .partner-card {
      padding: 2.5rem 1.75rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      height: 100%;
    }

    .partner-logo-wrapper {
      width: 7rem;
      height: 7rem;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform .35s var(--ease-out-expo);
      transform-origin: center;
    }

    .partner-logo-wrapper img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }

    .partner-card:hover .partner-logo-wrapper {
      transform: scale(1.18);
    }

    .partner-name {
      font-size: 1.25rem;
      font-weight: 900;
      color: #1e293b;
      margin-bottom: .85rem;
      transition: color .25s ease;
    }

    .dark .partner-name {
      color: #f1f5f9;
    }

    .partner-card:hover .partner-name {
      color: var(--brand-red);
    }

    .partner-description {
      font-size: .95rem;
      color: #64748b;
      text-align: center;
      line-height: 1.7;
    }

    .dark .partner-description {
      color: #94a3b8;
    }

    /* =========================================
        3) MOSAICO BECAS (mejorado, accesible)
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

    .beca-mosaic-link {
      display: block;
      height: 100%;
      width: 100%;
    }

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

    .beca-mosaic-card--center {
      grid-row: span 2;
    }

    .beca-mosaic-card:hover .beca-mosaic-img {
      transform: scale(1.06);
    }

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
      .becas-mosaic-grid {
        grid-template-columns: 1fr 1fr;
        grid-auto-rows: minmax(220px, 40vh);
      }

      .beca-mosaic-card--center {
        grid-row: span 1;
      }
    }

    @media (max-width:640px) {
      .becas-mosaic-grid {
        grid-template-columns: 1fr;
        grid-auto-rows: minmax(220px, 36vh);
      }

      .beca-mosaic-body--center {
        top: auto;
        bottom: 0;
        transform: none;
      }
    }

    /* =========================================
        4) HISTORIAS REALES (manteniendo tu estilo)
      ========================================= */
    .stories-carousel {
      overflow: hidden;
    }

    .stories-track {
      display: flex;
      transition: transform .7s var(--ease-out-expo);
      will-change: transform;
    }

    .stories-slide {
      min-width: 100%;
      padding: .25rem;
    }

    .stories-grid {
      display: grid;
      gap: 2rem;
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    @media (max-width:1024px) {
      .stories-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width:768px) {
      .stories-grid {
        grid-template-columns: 1fr;
      }
    }

    .story-icon {
      width: 40px;
      height: 40px;
      display: grid;
      place-items: center;
      border-radius: 12px;
      background: var(--brand-red);
      color: #fff;
      font-size: 18px;
      line-height: 1;
      box-shadow: 0 16px 30px -22px rgba(239, 35, 60, .85);
    }

    .story-avatar {
      border: 0 !important;
      box-shadow: 0 0 0 4px rgba(255, 255, 255, .88);
    }

    .dark .story-avatar {
      box-shadow: 0 0 0 4px rgba(255, 255, 255, .14);
    }

    .story-name-clamp {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .story-item {
      font-size: .95rem;
      line-height: 1.4;
    }

    .story-footer {
      opacity: .92;
    }

    .story-sep {
      margin-top: 1.5rem;
      border-top: 1px solid rgba(17, 24, 39, .08);
      padding-top: 1.25rem;
    }

    .dark .story-sep {
      border-top: 1px solid rgba(255, 255, 255, .10);
    }

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

    .student-card:hover::before {
      transform: translateX(120%);
    }

    .student-card:hover::after {
      opacity: 1;
    }

    .dark .student-card::before {
      background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, .10) 15%, transparent 35%);
    }

    .stories-dots {
      margin-top: 2rem;
      display: flex;
      justify-content: center;
      gap: .5rem;
    }

    .stories-dot {
      width: 10px;
      height: 10px;
      border-radius: 999px;
      background: #e5e7eb;
      cursor: pointer;
      border: 0;
      transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
    }

    .dark .stories-dot {
      background: #333;
    }

    .stories-dot.is-active {
      background: var(--brand-red);
      transform: scale(1.25);
      box-shadow: 0 0 0 6px rgba(239, 35, 60, .12);
    }

    @media (max-width:640px) {
      .story-avatar-size {
        width: 6rem !important;
        height: 6rem !important;
      }
    }

    /* =========================================
        5) SEDES (mejor: sin JS inline)
      ========================================= */
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

    .location-card img {
      transition: .7s var(--ease-out-expo);
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .location-card:hover img {
      transform: scale(1.08);
    }

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
  </style>

  {{-- 1) HERO --}}
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

  {{-- 2) BECAS DESTACADAS --}}
  <section id="becas" class="py-24 bg-white dark:bg-[#0a0a0a] overflow-hidden">
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
        {{-- BCP --}}
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

        {{-- BECA 18 (centro) --}}
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

        {{-- TECSUP --}}
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

        {{-- FERREYROS --}}
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

        {{-- UNI --}}
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

      <div class="mt-14 px-6 flex justify-center">
        <a href="{{ route('becas.index') }}" class="btn btn-soft">
          Ver todas las becas
          <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </a>
      </div>
    </div>
  </section>

  <div class="section-divider"></div>

  {{-- 3) MUNICIPALIDADES --}}
  <section class="py-24 bg-gray-50 dark:bg-[#0f0f0f]">
    <div class="container mx-auto px-6">
      <div class="section-head">
        <span class="section-kicker">Alianzas</span>
        <h2 class="section-title">Aliados Estratégicos</h2>
        <div class="section-line"></div>
        <p class="section-desc">Colaboramos con gobiernos locales para impulsar oportunidades educativas.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
        <div class="card partner-card group">
          <div class="partner-logo-wrapper">
            <img loading="lazy" alt="Escudo Cairani"
              src="{{ asset('img/aliados/escudo_municipalidad_cairani_tacna.jpg') }}">
          </div>
          <h3 class="partner-name text-center">Muni. Cairani</h3>
          <p class="partner-description text-center text-sm">
            <strong>Alcalde (2023-2026):</strong> Tito Mamani Mamani <br><br>
            Cooperación para fortalecer el desarrollo agrícola e hídrico en Candarave.
          </p>
          <div
            class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
            style="background-color: var(--brand-red);"></div>
        </div>

        <div class="card partner-card group">
          <div class="partner-logo-wrapper">
            <img loading="lazy" alt="Escudo Choco"
              src="{{ asset('img/aliados/escudo_municipalidad_choco_arequipa.jpg') }}">
          </div>
          <h3 class="partner-name text-center">Muni. Choco</h3>
          <p class="partner-description text-center text-sm">
            <strong>Alcaldesa (2023-2026):</strong> Eva Elizabeth Chura Quicaña <br><br>
            Impulsamos oportunidades para familias agricultoras y ganaderas en la zona altoandina.
          </p>
          <div
            class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
            style="background-color: var(--brand-red);"></div>
        </div>

        <div class="card partner-card group">
          <div class="partner-logo-wrapper">
            <img loading="lazy" alt="Escudo Sama"
              src="{{ asset('img/aliados/escudo_municipalidad_lasyaras_tacna.jpg') }}">
          </div>
          <h3 class="partner-name text-center">Muni. Sama</h3>
          <p class="partner-description text-center text-sm">
            <strong>Alcalde (2023-2026):</strong> Richard Santos Calizaya Pimentel <br><br>
            Alianza para fortalecer agricultura, turismo y la identidad cultural del valle.
          </p>
          <div
            class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
            style="background-color: var(--brand-red);"></div>
        </div>

        <div class="card partner-card group">
          <div class="partner-logo-wrapper">
            <img loading="lazy" alt="Escudo Palca" src="{{ asset('img/aliados/escudo_municipalidad_palca_tacna.jpg') }}">
          </div>
          <h3 class="partner-name text-center">Muni. Palca</h3>
          <p class="partner-description text-center text-sm">
            <strong>Alcalde (2023-2026):</strong> Toribio Zanga Onofre <br><br>
            Proyectos para bienestar social y mejoras de infraestructura en comunidades fronterizas.
          </p>
          <div
            class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
            style="background-color: var(--brand-red);"></div>
        </div>
      </div>
    </div>
  </section>

  <div class="section-divider"></div>

  {{-- 4) HISTORIAS REALES --}}
  <section class="py-24 bg-white dark:bg-[#0a0a0a] overflow-hidden">
    <div class="container mx-auto px-6">
      <div class="section-head">
        <span class="section-kicker">Testimonios</span>
        <h2 class="section-title">Historias Reales</h2>
        <div class="section-line"></div>
        <p class="section-desc">Conoce a algunos de nuestros estudiantes y aliados.</p>
      </div>

      <div class="stories-carousel">
        <div class="stories-track" id="storiesTrack">
          {{-- SLIDE 1 --}}
          <div class="stories-slide">
            <div class="stories-grid">
              {{-- CARD 1 --}}
              <div class="flex justify-center">
                <article class="student-card card group p-6 pt-8 text-center w-full max-w-sm">
                  <header>
                    <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                      <img loading="lazy" alt="Foto de perfil"
                        class="w-32 h-32 story-avatar story-avatar-size rounded-full object-cover transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/historias/keler.png') }}" />
                    </div>
                    <h3 class="text-2xl font-black tracking-wide story-name-clamp" style="color:var(--brand-red)">
                      Miranda Condori Keller
                    </h3>
                    <p class="text-base mt-1 text-gray-500 dark:text-gray-400">Ingresante 2025</p>
                  </header>

                  <div class="mt-8 space-y-4 text-left">
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">workspace_premium</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">1er puesto (IEN-UNI-2025)</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">school</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Ingeniería Petroquímica</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">account_balance</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Universidad Nacional de
                        Ingeniería</p>
                    </div>
                  </div>

                  <div class="story-sep">
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300 story-footer">
                      Esfuerzo + disciplina + acompañamiento: un ejemplo de constancia y alto rendimiento.
                    </p>
                  </div>
                </article>
              </div>

              {{-- CARD 2 --}}
              <div class="flex justify-center">
                <article class="student-card card group p-6 pt-8 text-center w-full max-w-sm">
                  <header>
                    <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                      <img loading="lazy" alt="Foto de perfil"
                        class="w-32 h-32 story-avatar story-avatar-size rounded-full object-cover transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/historias/benjamin.png') }}" />
                    </div>
                    <h3 class="text-2xl font-black tracking-wide story-name-clamp" style="color:var(--brand-red)">
                      Navarro Loyola Benjamin Shenedit Bruce
                    </h3>
                    <p class="text-base mt-1 text-gray-500 dark:text-gray-400">Ingresante UNI</p>
                  </header>

                  <div class="mt-8 space-y-4 text-left">
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">workspace_premium</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">1er puesto</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">science</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Química</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">account_balance</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Universidad Nacional de
                        Ingeniería</p>
                    </div>
                  </div>

                  <div class="story-sep">
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300 story-footer">
                      Un resultado excelente que demuestra enfoque y preparación constante.
                    </p>
                  </div>
                </article>
              </div>

              {{-- CARD 3 --}}
              <div class="flex justify-center">
                <article class="student-card card group p-6 pt-8 text-center w-full max-w-sm">
                  <header>
                    <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                      <img loading="lazy" alt="Foto de perfil"
                        class="w-32 h-32 story-avatar story-avatar-size rounded-full object-cover transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/historias/fabricio.png') }}" />
                    </div>
                    <h3 class="text-2xl font-black tracking-wide story-name-clamp" style="color:var(--brand-red)">
                      Noa Ccallo Alexis Fabrizio
                    </h3>
                    <p class="text-base mt-1 text-gray-500 dark:text-gray-400">Ingresante UNI</p>
                  </header>

                  <div class="mt-8 space-y-4 text-left">
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">verified</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Beca: Beca 18</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">security</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Ingeniería de Ciberseguridad</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">account_balance</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Universidad Nacional de
                        Ingeniería</p>
                    </div>
                  </div>

                  <div class="story-sep">
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300 story-footer">
                      Un gran inicio en una carrera con alta demanda y futuro prometedor.
                    </p>
                  </div>
                </article>
              </div>
            </div>
          </div>

          {{-- SLIDE 2 --}}
          <div class="stories-slide">
            <div class="stories-grid">
              {{-- CARD 4 --}}
              <div class="flex justify-center">
                <article class="student-card card group p-6 pt-8 text-center w-full max-w-sm">
                  <header>
                    <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                      <img loading="lazy" alt="Foto de perfil"
                        class="w-32 h-32 story-avatar story-avatar-size rounded-full object-cover transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/historias/walter.png') }}" />
                    </div>
                    <h3 class="text-2xl font-black tracking-wide story-name-clamp" style="color:var(--brand-red)">
                      Alcantara Quispe Walter Amilcar
                    </h3>
                    <p class="text-base mt-1 text-gray-500 dark:text-gray-400">Ingresante Beca 18</p>
                  </header>

                  <div class="mt-8 space-y-4 text-left">
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">verified</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Beca: Beca 18</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">eco</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Ingeniería Ambiental</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">account_balance</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200 story-item">Universidad Peruana Cayetano
                        Heredia</p>
                    </div>
                  </div>

                  <div class="story-sep">
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300 story-footer">
                      Ingresante a la UPCH, reconocida como una de las universidades más destacadas del país.
                    </p>
                  </div>
                </article>
              </div>

              {{-- CARD 5 --}}
              <div class="flex justify-center">
                <article class="student-card card group p-6 pt-8 text-center w-full max-w-sm">
                  <header>
                    <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                      <img loading="lazy" alt="Foto de perfil"
                        class="w-32 h-32 rounded-full object-cover story-avatar transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/historias/milton_ccota.png') }}" />
                    </div>

                    <h3 class="text-2xl font-black tracking-wide" style="color:var(--brand-red)">
                      Milton Ccota Mamani
                    </h3>
                    <p class="text-base mt-1 text-gray-500 dark:text-gray-400">Ingresante UNI</p>
                  </header>

                  <div class="mt-8 space-y-4 text-left">
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">verified</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200">IEN-2026 — Sede Tacna</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">engineering</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200">Ingeniería Civil</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">account_balance</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200">Universidad Nacional de Ingeniería</p>
                    </div>
                  </div>

                  <div class="story-sep">
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                      Taller CIDECH 2026: constancia y compromiso en su preparación académica.
                    </p>
                  </div>
                </article>
              </div>

              {{-- CARD 6 --}}
              <div class="flex justify-center">
                <article class="student-card card group p-6 pt-8 text-center w-full max-w-sm">
                  <header>
                    <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                      <img loading="lazy" alt="Foto de perfil"
                        class="w-32 h-32 rounded-full object-cover story-avatar transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/historias/alex_gallegos.png') }}" />
                    </div>

                    <h3 class="text-2xl font-black tracking-wide" style="color:var(--brand-red)">
                      Alex Gallegos Humire
                    </h3>
                    <p class="text-base mt-1 text-gray-500 dark:text-gray-400">Ingresante UNI</p>
                  </header>

                  <div class="mt-8 space-y-4 text-left">
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">workspace_premium</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200">1er puesto (IEN-2026)</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">science</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200">Ingeniería Química</p>
                    </div>
                    <div class="flex items-center space-x-4">
                      <span class="material-symbols-outlined story-icon">account_balance</span>
                      <p class="font-medium text-gray-700 dark:text-gray-200">Universidad Nacional de Ingeniería</p>
                    </div>
                  </div>

                  <div class="story-sep">
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                      Taller CIDECH 2026: excelencia académica y enfoque constante.
                    </p>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- DOTS --}}
      <div class="stories-dots" role="tablist" aria-label="Historias reales">
        <button class="stories-dot is-active" data-slide="0" type="button" aria-label="Slide 1"></button>
        <button class="stories-dot" data-slide="1" type="button" aria-label="Slide 2"></button>
      </div>
    </div>

    <script>
      (function () {
        const track = document.getElementById('storiesTrack');
        const dots = document.querySelectorAll('.stories-dot');
        let current = 0;

        function goToSlide(index) {
          current = index;
          track.style.transform = 'translateX(-' + (index * 100) + '%)';
          dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
        }

        dots.forEach(dot => {
          dot.addEventListener('click', function () {
            goToSlide(parseInt(this.dataset.slide, 10));
          });
        });

        window.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowRight') goToSlide((current + 1) % dots.length);
          if (e.key === 'ArrowLeft') goToSlide((current - 1 + dots.length) % dots.length);
        });
      })();
    </script>
  </section>

  <div class="section-divider"></div>

  {{-- 5) SEDES --}}
  <section class="py-24 bg-gray-50 dark:bg-[#0a0a0a]">
    <div class="container mx-auto px-6">
      <div class="section-head">
        <span class="section-kicker">Oficinas</span>
        <h2 class="section-title">Nuestras Sedes</h2>
        <div class="section-line"></div>
        <p class="section-desc">Visítanos o comunícate con la sede más cercana.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {{-- AREQUIPA --}}
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

        {{-- TACNA --}}
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

        {{-- LIMA --}}
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



  {{-- SCRIPT GENERAL --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      /* TYPEWRITER */
      const textElement = document.getElementById('typewriter-text');
      const phrases = ["Beca Tecsup", "Beca Cayetano Heredia", "Beca Ferreyros", "Beca BCP", "Beca UNI", "Beca San Marcos"];
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