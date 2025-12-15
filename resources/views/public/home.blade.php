@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
<style>
/* =========================================
   CONFIGURACIÓN BASE (#EF233C)
========================================= */
:root{
  --brand-red:#ef233c;
  --brand-red-light:rgba(239,35,60,.08);
  --ease-out-expo:cubic-bezier(.19,1,.22,1);
}

/* OVERRIDES GLOBALES */
.bg-primary{ background-color:var(--brand-red)!important; }
.text-primary{ color:var(--brand-red)!important; }
.border-primary{ border-color:var(--brand-red)!important; }

.no-scrollbar::-webkit-scrollbar{ display:none; }
.no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none; }

/* =========================================
   1. HERO (SPLIT LAYOUT + ALTURA AJUSTADA)
========================================= */
.hero-wrapper{
  position:relative;
  width:100%;
  height:calc(100vh - 6rem);
  min-height:600px;
  overflow:hidden;
  display:flex;
  align-items:center;
  justify-content:center;
  background-color:var(--brand-red);
}
.hero-bg-css{
  position:absolute;
  inset:0;
  z-index:0;
  background:linear-gradient(135deg,#ff4d63 0%,#ef233c 50%,#d61c32 100%);
  background-size:200% 200%;
  animation:gradientMove 10s ease infinite alternate;
}
.hero-pattern{
  position:absolute;
  inset:0;
  z-index:1;
  background-image:radial-gradient(rgba(255,255,255,.1) 1px,transparent 1px);
  background-size:30px 30px;
  opacity:.4;
}
.hero-content{
  position:relative;
  z-index:10;
  width:100%;
  max-width:1200px;
  padding:0 2rem;
  display:grid;
  grid-template-columns:1fr 1fr;
  align-items:center;
  gap:2rem;
}
.hero-text-col{
  text-align:left;
  display:flex;
  flex-direction:column;
  align-items:flex-start;
}
.hero-title{
  font-size:clamp(3.5rem,6vw + 1rem,7.5rem);
  line-height:.9;
  font-weight:900;
  color:#fff;
  text-shadow:0 4px 30px rgba(180,20,30,.4);
  margin-bottom:1.5rem;
  letter-spacing:-.04em;
}
.hero-subtitle{
  font-size:clamp(1.2rem,1.5vw,1.5rem);
  color:rgba(255,255,255,.95);
  font-weight:400;
  max-width:600px;
  margin-bottom:2.5rem;
  line-height:1.4;
}
.hero-visual-col{
  display:flex;
  justify-content:center;
  align-items:center;
  position:relative;
}
.hero-main-icon{
  font-size:clamp(15rem,25vw,30rem);
  color:rgba(255,255,255,.15);
  filter:drop-shadow(0 10px 40px rgba(0,0,0,.1));
  animation:floatingLogo 6s ease-in-out infinite;
  transform:rotate(-10deg);
}
.typewriter-box{
  display:inline-flex;
  align-items:center;
  background:rgba(255,255,255,.15);
  border:1px solid rgba(255,255,255,.4);
  padding:.8rem 2rem;
  border-radius:12px;
  backdrop-filter:blur(8px);
  box-shadow:0 10px 30px rgba(0,0,0,.1);
}
.typewriter-label{
  color:rgba(255,255,255,.9);
  font-weight:600;
  margin-right:1rem;
  text-transform:uppercase;
  font-size:.8rem;
  letter-spacing:.1em;
}
.typewriter-text{
  font-family:'Courier New',monospace;
  font-size:clamp(1.1rem,2vw,1.4rem);
  font-weight:700;
  color:#fff;
  text-shadow:0 0 10px rgba(255,255,255,.6);
}
.cursor{
  width:3px;
  height:1.4em;
  background:#fff;
  margin-left:8px;
  animation:blink 1s step-end infinite;
}
.scroll-indicator{
  position:absolute;
  bottom:30px;
  left:50%;
  transform:translateX(-50%);
  color:rgba(255,255,255,.7);
  animation:bounce 2s infinite;
  z-index:20;
  transition:color .3s;
}
.scroll-indicator:hover{ color:#fff; }

@media (max-width:1024px){
  .hero-content{ grid-template-columns:1fr; text-align:center; gap:2rem; }
  .hero-text-col{ align-items:center; }
  .hero-visual-col{ order:-1; }
  .hero-main-icon{ font-size:12rem; margin-bottom:-2rem; opacity:.3; }
}

@keyframes gradientMove{ 0%{background-position:0% 50%} 100%{background-position:100% 50%} }
@keyframes floatingLogo{ 0%,100%{transform:translateY(0) rotate(-5deg)} 50%{transform:translateY(-20px) rotate(5deg)} }
@keyframes blink{ 50%{opacity:0} }
@keyframes bounce{
  0%,20%,50%,80%,100%{transform:translate(-50%,0)}
  40%{transform:translate(-50%,-10px)}
  60%{transform:translate(-50%,-5px)}
}

/* =========================================
   2. ESTILOS TARJETAS GENERALES
========================================= */
.partner-card,
.student-profile,
.location-card,
.beca-slide-card{
  background:#fff;
  border-radius:1rem;
  border:1px solid rgba(239,35,60,.08);
  transition:all .4s var(--ease-out-expo);
  overflow:hidden;
  position:relative;
}
.dark .partner-card,
.dark .student-profile,
.dark .location-card,
.dark .beca-slide-card{
  background:#151515;
  border-color:rgba(255,255,255,.05);
}
.partner-card:hover,
.student-profile:hover,
.location-card:hover,
.beca-slide-card:hover{
  transform:translateY(-8px);
  box-shadow:0 20px 40px -10px rgba(239,35,60,.15);
  border-color:rgba(239,35,60,.3);
}
.partner-card{
  padding:3rem 2rem;
  display:flex;
  flex-direction:column;
  align-items:center;
  height:100%;
}
.partner-logo-wrapper{
  width:7.5rem;
  height:7.5rem;
  margin-bottom:2rem;
  display:flex;
  align-items:center;
  justify-content:center;
  opacity:1;
  transition:transform .4s ease;
  transform-origin:center;
}
.partner-logo-wrapper img{ max-width:100%; max-height:100%; object-fit:contain; }
.partner-card:hover .partner-logo-wrapper{ transform:scale(1.35); }

.partner-name{
  font-size:1.35rem;
  font-weight:800;
  color:#1e293b;
  margin-bottom:1rem;
  transition:color .3s;
}
.dark .partner-name{ color:#f1f5f9; }
.partner-card:hover .partner-name{ color:var(--brand-red); }

.partner-description{
  font-size:.95rem;
  color:#64748b;
  text-align:center;
  line-height:1.7;
  font-weight:400;
}
.dark .partner-description{ color:#94a3b8; }

.location-card{ display:flex; flex-direction:column; height:100%; }
.location-image-container{ height:16rem; overflow:hidden; position:relative; }
.location-card img,
.beca-slide-card img{
  transition:.7s ease;
  width:100%;
  height:100%;
  object-fit:cover;
}
.location-card:hover img,
.beca-slide-card:hover img{ transform:scale(1.08); }

.sede-icon{
  width:3.5rem;
  height:3.5rem;
  background-color:var(--brand-red-light);
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  color:var(--brand-red);
  transition:all .3s ease;
}
.location-card:hover .sede-icon{
  background-color:var(--brand-red);
  color:#fff;
  transform:scale(1.1);
}

.carousel-dot{
  width:10px;
  height:10px;
  border-radius:50%;
  background-color:#e5e7eb;
  transition:.3s ease;
  cursor:pointer;
}
.dark .carousel-dot{ background-color:#333; }
.carousel-dot.active{
  background-color:var(--brand-red);
  transform:scale(1.3);
  box-shadow:0 0 10px rgba(239,35,60,.4);
}

/* =========================================
   3. MOSAICO DE BECAS (EFECTO UPC)
========================================= */
.becas-header{ text-align:center; margin-top:3rem; margin-bottom:3rem; }
.becas-title{ margin:0; font-size:2.5rem; font-weight:900; color:#6e0c0c; }

.becas-mosaic-grid{
  display:grid;
  grid-template-columns:repeat(3,minmax(0,1fr));
  grid-auto-rows:30vh;
  gap:1.5rem;
  padding:0 1.5rem;
}
.beca-mosaic-card{
  position:relative;
  overflow:hidden;
  border-radius:1rem;
  background:#000;
  cursor:pointer;
}
.beca-mosaic-img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
  transition:transform .4s ease;
}
.beca-mosaic-overlay{
  position:absolute;
  inset:0;
  background:transparent;
  transition:background .3s ease;
  z-index:0;
}
.beca-mosaic-body{
  position:absolute;
  inset-inline:0;
  bottom:0;
  padding:1.4rem 1.8rem;
  color:#fff;
  z-index:1;
  display:flex;
  flex-direction:column;
  gap:.4rem;
}
.beca-mosaic-body--center{
  top:50%;
  bottom:auto;
  transform:translateY(-50%);
}
.beca-mosaic-tag{
  display:inline-block;
  padding:.25rem .7rem;
  border-radius:999px;
  background:#fff;
  color:var(--brand-red);
  font-size:.75rem;
  font-weight:700;
  text-transform:uppercase;
  letter-spacing:.06em;
}
.beca-mosaic-title{
  margin:0;
  font-size:.95rem;
  font-weight:800;
  line-height:1.2;
  max-width:24rem;

  /* oculto por defecto */
  opacity:0;
  transform:translateY(8px);
  max-height:0;
  overflow:hidden;
  transition:opacity .25s ease, transform .25s ease, max-height .25s ease;
}
.beca-mosaic-card--center{ grid-row:span 2; }
.beca-mosaic-card:hover .beca-mosaic-img{ transform:scale(1.05); }
.beca-mosaic-card:hover .beca-mosaic-overlay{ background:rgba(239,35,60,.85); }
.beca-mosaic-card:hover .beca-mosaic-title{
  opacity:1;
  transform:translateY(0);
  max-height:200px;
}
@media (max-width:1024px){
  .becas-mosaic-grid{ grid-template-columns:1fr 1fr; grid-auto-rows:40vh; }
  .beca-mosaic-card--center{ grid-row:span 1; }
}
@media (max-width:640px){
  .becas-mosaic-grid{ grid-template-columns:1fr; grid-auto-rows:36vh; }
  .beca-mosaic-body--center{ top:auto; bottom:0; transform:none; }
}

/* =========================================
   4. HISTORIAS REALES (integrado al layout)
========================================= */
.stories-carousel{ overflow:hidden; }
.stories-track{
  display:flex;
  transition:transform .7s var(--ease-out-expo);
  will-change:transform;
}
.stories-slide{ min-width:100%; padding:.25rem; }
.stories-grid{
  display:grid;
  gap:2rem;
  grid-template-columns:repeat(3,minmax(0,1fr));
}
@media (max-width:1024px){ .stories-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); } }
@media (max-width:768px){ .stories-grid{ grid-template-columns:1fr; } }

.story-card{ display:flex; flex-direction:column; align-items:center; gap:1rem; }
.story-avatar-wrap{
  width:clamp(10rem,18vw,16rem);
  height:clamp(10rem,18vw,16rem);
  border-radius:999px;
  background:var(--brand-red);
  padding:.75rem;
  display:flex;
  align-items:center;
  justify-content:center;
  box-shadow:0 18px 45px -25px rgba(239,35,60,.55);
}
.story-avatar-wrap img{
  width:100%;
  height:100%;
  border-radius:999px;
  object-fit:cover;
  border:6px solid rgba(255,255,255,.85);
}
.story-info{
  width:100%;
  max-width:22rem;
  background:#fff;
  border-radius:1.25rem;
  border:1px solid rgba(239,35,60,.16);
  padding:1.25rem;
  text-align:center;
  box-shadow:0 12px 30px rgba(0,0,0,.06);
  transition:transform .35s var(--ease-out-expo), box-shadow .35s var(--ease-out-expo), border-color .35s var(--ease-out-expo);
}
.dark .story-info{
  background:#151515;
  border-color:rgba(255,255,255,.08);
  box-shadow:none;
}
.story-card:hover .story-info{
  transform:translateY(-6px);
  box-shadow:0 22px 50px -25px rgba(239,35,60,.22);
  border-color:rgba(239,35,60,.42);
}
.story-name{
  font-size:1.05rem;
  font-weight:900;
  color:#111827;
  line-height:1.25;
  word-break:break-word;
}
.dark .story-name{ color:#f1f5f9; }
.story-role{
  margin-top:.25rem;
  font-size:.92rem;
  font-weight:800;
  color:#111827;
  line-height:1.25;
}
.dark .story-role{ color:#e2e8f0; }
.story-desc{
  margin-top:.55rem;
  font-size:.9rem;
  color:#64748b;
  line-height:1.6;
}
.dark .story-desc{ color:#94a3b8; }

.stories-dots{
  margin-top:2rem;
  display:flex;
  justify-content:center;
  gap:.5rem;
}
.stories-dot{
  width:10px;
  height:10px;
  border-radius:999px;
  background:#e5e7eb;
  cursor:pointer;
  border:0;
  transition:transform .2s ease, background .2s ease, box-shadow .2s ease;
}
.dark .stories-dot{ background:#333; }
.stories-dot.is-active{
  background:var(--brand-red);
  transform:scale(1.25);
  box-shadow:0 0 0 6px rgba(239,35,60,.12);
}
</style>

{{-- 1. HERO --}}
<div class="hero-wrapper">
  <div class="hero-bg-css"></div>
  <div class="hero-pattern"></div>

  <div class="hero-content animate-fade-in-up">
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

    <div class="hero-visual-col">
      <span class="material-symbols-outlined hero-main-icon">school</span>
    </div>
  </div>

  <a href="#becas" class="scroll-indicator">
    <span class="material-symbols-outlined text-5xl">keyboard_arrow_down</span>
  </a>
</div>

{{-- 2. BECAS DESTACADAS --}}
<section id="becas" class="py-2 bg-white dark:bg-[#0a0a0a] overflow-hidden">
  <div class="mx-auto px-0">
    <div class="becas-header px-6">
      <h2 class="becas-title">Becas destacadas</h2>
    </div>

    <div class="becas-mosaic-grid">
      <article class="beca-mosaic-card beca-mosaic-card--left-top"
        onclick="window.location='{{ route('becas.show', 'beca-bcp') }}'">
        <img src="{{ asset('img/becas/beca-bcp.png') }}" alt="Beca BCP" class="beca-mosaic-img">
        <div class="beca-mosaic-overlay"></div>
        <div class="beca-mosaic-body">
          <span class="beca-mosaic-tag">Beca BCP</span>
          <h3 class="beca-mosaic-title">EPGXpert Talks: beca para líderes que quieren conectar con expertos.</h3>
        </div>
      </article>

      <article class="beca-mosaic-card beca-mosaic-card--center"
        onclick="window.location='{{ route('becas.show', 'beca-18') }}'">
        <img src="{{ asset('img/becas/beca-18.png') }}" alt="Beca 18" class="beca-mosaic-img">
        <div class="beca-mosaic-overlay"></div>
        <div class="beca-mosaic-body beca-mosaic-body--center">
          <span class="beca-mosaic-tag">Beca 18</span>
          <h3 class="beca-mosaic-title">Beca de excelencia académica para talentos de todo el país.</h3>
        </div>
      </article>

      <article class="beca-mosaic-card beca-mosaic-card--right-top"
        onclick="window.location='{{ route('becas.show', 'beca-tecsup') }}'">
        <img src="{{ asset('img/becas/beca-tecsup.png') }}" alt="Beca Tecsup" class="beca-mosaic-img">
        <div class="beca-mosaic-overlay"></div>
        <div class="beca-mosaic-body">
          <span class="beca-mosaic-tag">Beca Tecsup</span>
          <h3 class="beca-mosaic-title">Formación tecnológica en carreras con alta demanda laboral.</h3>
        </div>
      </article>

      <article class="beca-mosaic-card beca-mosaic-card--left-bottom"
        onclick="window.location='{{ route('becas.show', 'beca-ferreyros') }}'">
        <img src="{{ asset('img/Beca-Ferreyros.png') }}" alt="Beca Ferreyros" class="beca-mosaic-img">
        <div class="beca-mosaic-overlay"></div>
        <div class="beca-mosaic-body">
          <span class="beca-mosaic-tag">Beca Ferreyros</span>
          <h3 class="beca-mosaic-title">Especialización en el sector industrial y maquinaria pesada.</h3>
        </div>
      </article>

      <article class="beca-mosaic-card beca-mosaic-card--right-bottom"
        onclick="window.location='{{ route('becas.show', 'beca-uni') }}'">
        <img src="{{ asset('img/becas/beca-uni.png') }}" alt="Beca UNI" class="beca-mosaic-img">
        <div class="beca-mosaic-overlay"></div>
        <div class="beca-mosaic-body">
          <span class="beca-mosaic-tag">Beca UNI</span>
          <h3 class="beca-mosaic-title">Beca para estudios en ingeniería y ciencias en la UNI.</h3>
        </div>
      </article>
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
      <div class="partner-card group">
        <div class="partner-logo-wrapper">
          <img alt="Escudo Cairani" class="partner-logo" src="{{ asset('img/aliados/escudo_municipalidad_cairani_tacna.jpg') }}">
        </div>
        <h3 class="partner-name text-center">Muni. Cairani</h3>
        <p class="partner-description text-center text-sm">
          <strong>Alcalde (2023-2026):</strong> Tito Mamani Mamani <br><br>
          Gracias a la cooperación con la Municipalidad de Cairani, seguimos construyendo
          un distrito más próspero, potenciando nuestra riqueza agrícola e hídrica en el corazón
          de la provincia de Candarave.
        </p>
        <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
          style="background-color: var(--brand-red);"></div>
      </div>

      <div class="partner-card group">
        <div class="partner-logo-wrapper">
          <img alt="Escudo Choco" class="partner-logo" src="{{ asset('img/aliados/escudo_municipalidad_choco_arequipa.jpg') }}">
        </div>
        <h3 class="partner-name text-center">Muni. Choco</h3>
        <p class="partner-description text-center text-sm">
          <strong>Alcaldesa (2023-2026):</strong> Eva Elizabeth Chura Quicaña <br><br>
          Junto a la Municipalidad de Choco, trabajamos por el progreso de nuestro distrito
          enclavado en la cordillera, mejorando la calidad de vida y las oportunidades para
          nuestras familias agricultoras y ganaderas.
        </p>
        <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
          style="background-color: var(--brand-red);"></div>
      </div>

      <div class="partner-card group">
        <div class="partner-logo-wrapper">
          <img alt="Escudo Sama" class="partner-logo" src="{{ asset('img/aliados/escudo_municipalidad_lasyaras_tacna.jpg') }}">
        </div>
        <h3 class="partner-name text-center">Muni. Sama</h3>
        <p class="partner-description text-center text-sm">
          <strong>Alcalde (2023-2026):</strong> Richard Santos Calizaya Pimentel <br><br>
          En alianza estratégica con la Municipalidad de Sama, impulsamos el crecimiento de
          nuestro valle, apoyando la agricultura, el turismo en nuestras playas y la revalorización
          de nuestra historia local.
        </p>
        <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
          style="background-color: var(--brand-red);"></div>
      </div>

      <div class="partner-card group">
        <div class="partner-logo-wrapper">
          <img alt="Escudo Palca" class="partner-logo" src="{{ asset('img/aliados/escudo_municipalidad_palca_tacna.jpg') }}">
        </div>
        <h3 class="partner-name text-center">Muni. Palca</h3>
        <p class="partner-description text-center text-sm">
          <strong>Alcalde (2023-2026):</strong> Toribio Zanga Onofre <br><br>
          Gracias al trabajo conjunto con la Municipalidad de Palca, fortalecemos el desarrollo
          de nuestras comunidades fronterizas y altoandinas, promoviendo proyectos de saneamiento
          y bienestar social para todos los palqueños.
        </p>
        <div class="absolute bottom-0 left-0 w-full h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
          style="background-color: var(--brand-red);"></div>
      </div>
    </div>
  </div>
</section>

{{-- 4. HISTORIAS REALES (REEMPLAZADO por la tarjeta “Student Achievement”) --}}
<section class="py-24 bg-white dark:bg-[#0a0a0a] overflow-hidden">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">Historias Reales</h2>
      <p class="text-gray-500 dark:text-gray-400 text-lg">Conoce a algunos de nuestros estudiantes y aliados.</p>
    </div>

    <div class="stories-carousel">
      <div class="stories-track" id="storiesTrack">

        {{-- SLIDE 1 --}}
        <div class="stories-slide">
          <div class="stories-grid">

            {{-- CARD 1 --}}
            <div class="flex justify-center">
              <article class="group bg-white dark:bg-[#151515] rounded-2xl shadow-lg dark:shadow-none p-6 pt-8 text-center w-full max-w-sm border border-gray-100 dark:border-white/10">
                <header>
                  <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                    <img
                      alt="Foto de perfil"
                      class="w-32 h-32 rounded-full object-cover border-4 transition-transform duration-300 group-hover:scale-110"
                      style="border-color:var(--brand-red)"
                      src="{{ asset('img/historias/keler.png') }}"
                    />
                  </div>
                  <h3 class="text-2xl font-bold tracking-wide" style="color:var(--brand-red)">
                    Miranda Condori Keller
                  </h3>
                  <p class="text-base mt-1 text-gray-500 dark:text-gray-400">
                    Ingresante 2025
                  </p>
                </header>

                <div class="mt-8 space-y-4 text-left">
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">workspace_premium</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">1er puesto (IEN-UNI-2025)</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">school</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Ingeniería Petroquímica</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">account_balance</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Universidad Nacional de Ingeniería</p>
                  </div>
                </div>

                <footer class="mt-8">
                  <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    Esfuerzo + disciplina + acompañamiento: un ejemplo de constancia y alto rendimiento.
                  </p>
                </footer>
              </article>
            </div>

            {{-- CARD 2 --}}
            <div class="flex justify-center">
              <article class="group bg-white dark:bg-[#151515] rounded-2xl shadow-lg dark:shadow-none p-6 pt-8 text-center w-full max-w-sm border border-gray-100 dark:border-white/10">
                <header>
                  <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                    <img
                      alt="Foto de perfil"
                      class="w-32 h-32 rounded-full object-cover border-4 transition-transform duration-300 group-hover:scale-110"
                      style="border-color:var(--brand-red)"
                      src="{{ asset('img/historias/benjamin.png') }}"
                    />
                  </div>
                  <h3 class="text-2xl font-bold tracking-wide" style="color:var(--brand-red)">
                    Navarro Loyola Benjamin Shenedit Bruce
                  </h3>
                  <p class="text-base mt-1 text-gray-500 dark:text-gray-400">
                    Ingresante UNI
                  </p>
                </header>

                <div class="mt-8 space-y-4 text-left">
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">workspace_premium</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">1er puesto</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">science</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Química</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">account_balance</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Universidad Nacional de Ingeniería</p>
                  </div>
                </div>

                <footer class="mt-8">
                  <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    Un resultado excelente que demuestra enfoque y preparación constante.
                  </p>
                </footer>
              </article>
            </div>

            {{-- CARD 3 --}}
            <div class="flex justify-center">
              <article class="group bg-white dark:bg-[#151515] rounded-2xl shadow-lg dark:shadow-none p-6 pt-8 text-center w-full max-w-sm border border-gray-100 dark:border-white/10">
                <header>
                  <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                    <img
                      alt="Foto de perfil"
                      class="w-32 h-32 rounded-full object-cover border-4 transition-transform duration-300 group-hover:scale-110"
                      style="border-color:var(--brand-red)"
                      src="{{ asset('img/historias/fabricio.png') }}"
                    />
                  </div>
                  <h3 class="text-2xl font-bold tracking-wide" style="color:var(--brand-red)">
                    Noa Ccallo Alexis Fabrizio
                  </h3>
                  <p class="text-base mt-1 text-gray-500 dark:text-gray-400">
                    Ingresante UNI 
                  </p>
                </header>

                <div class="mt-8 space-y-4 text-left">
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">verified</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Beca: Beca 18 </p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">security</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Ingeniería de Ciberseguridad</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">account_balance</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Universidad Nacional de Ingeniería</p>
                  </div>
                </div>

                <footer class="mt-8">
                  <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    Un gran inicio en una carrera con alta demanda y futuro prometedor.
                  </p>
                </footer>
              </article>
            </div>

          </div>
        </div>

        {{-- SLIDE 2 --}}
        <div class="stories-slide">
          <div class="stories-grid">

            {{-- CARD 4 --}}
            <div class="flex justify-center">
              <article class="group bg-white dark:bg-[#151515] rounded-2xl shadow-lg dark:shadow-none p-6 pt-8 text-center w-full max-w-sm border border-gray-100 dark:border-white/10">
                <header>
                  <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                    <img
                      alt="Foto de perfil"
                      class="w-32 h-32 rounded-full object-cover border-4 transition-transform duration-300 group-hover:scale-110"
                      style="border-color:var(--brand-red)"
                      src="{{ asset('img/historias/ana1.png') }}"
                    />
                  </div>
                  <h3 class="text-2xl font-bold tracking-wide" style="color:var(--brand-red)">
                    Ana Torres
                  </h3>
                  <p class="text-base mt-1 text-gray-500 dark:text-gray-400">
                    Mentora académica
                  </p>
                </header>

                <div class="mt-8 space-y-4 text-left">
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">menu_book</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Plan de estudio y hábitos</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">schedule</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Organización del tiempo</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">psychology</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Manejo de ansiedad</p>
                  </div>
                </div>

                <footer class="mt-8">
                  <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    Apoya a los becarios a sostener rutinas y rendir mejor en exámenes.
                  </p>
                </footer>
              </article>
            </div>

            {{-- CARD 5 --}}
            <div class="flex justify-center">
              <article class="group bg-white dark:bg-[#151515] rounded-2xl shadow-lg dark:shadow-none p-6 pt-8 text-center w-full max-w-sm border border-gray-100 dark:border-white/10">
                <header>
                  <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                    <img
                      alt="Foto de perfil"
                      class="w-32 h-32 rounded-full object-cover border-4 transition-transform duration-300 group-hover:scale-110"
                      style="border-color:var(--brand-red)"
                      src="{{ asset('img/historias/luis1.png') }}"
                    />
                  </div>
                  <h3 class="text-2xl font-bold tracking-wide" style="color:var(--brand-red)">
                    Luis Ramírez
                  </h3>
                  <p class="text-base mt-1 text-gray-500 dark:text-gray-400">
                    Egresado becado
                  </p>
                </header>

                <div class="mt-8 space-y-4 text-left">
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">school</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Culminó su carrera</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">volunteer_activism</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Voluntario PROMUBE</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">groups</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Mentoría a nuevos estudiantes</p>
                  </div>
                </div>

                <footer class="mt-8">
                  <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    Su experiencia inspira y guía a quienes recién empiezan.
                  </p>
                </footer>
              </article>
            </div>

            {{-- CARD 6 --}}
            <div class="flex justify-center">
              <article class="group bg-white dark:bg-[#151515] rounded-2xl shadow-lg dark:shadow-none p-6 pt-8 text-center w-full max-w-sm border border-gray-100 dark:border-white/10">
                <header>
                  <div class="relative inline-block mb-4 overflow-hidden rounded-full">
                    <img
                      alt="Foto de perfil"
                      class="w-32 h-32 rounded-full object-cover border-4 transition-transform duration-300 group-hover:scale-110"
                      style="border-color:var(--brand-red)"
                      src="{{ asset('img/historias/carla1.png') }}"
                    />
                  </div>
                  <h3 class="text-2xl font-bold tracking-wide" style="color:var(--brand-red)">
                    Carla Medina
                  </h3>
                  <p class="text-base mt-1 text-gray-500 dark:text-gray-400">
                    Psicóloga educativa
                  </p>
                </header>

                <div class="mt-8 space-y-4 text-left">
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">favorite</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Soporte socioemocional</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">self_improvement</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Bienestar y motivación</p>
                  </div>
                  <div class="flex items-center space-x-4">
                    <span class="material-symbols-outlined w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg text-white" style="background:var(--brand-red)">psychology</span>
                    <p class="font-medium text-gray-700 dark:text-gray-200">Acompañamiento continuo</p>
                  </div>
                </div>

                <footer class="mt-8">
                  <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    Acompaña el proceso socioemocional de los beneficiarios durante su camino académico.
                  </p>
                </footer>
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

      // setInterval(() => goToSlide((current + 1) % dots.length), 8000);
    })();
  </script>
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
          <img class="h-full w-full object-cover" alt="Sede Arequipa" src="{{ asset('img/sedes/sede_arequipa.png') }}" />
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
              <span class="text-sm">C. Sanchez Trujillo 240, Miraflores 04004, Arequipa.</span>
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
          <img class="h-full w-full object-cover" alt="Sede Tacna" src="{{ asset('img/sedes/sede_tacna.jpg') }}" />
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
              <span class="text-sm">Lun-Vie, 8:00 AM - 1:00 PM y 3:00 PM - 6:00 PM</span>
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
          <img class="h-full w-full object-cover" alt="Sede Lima" src="{{ asset('img/sedes/sede_lima.jpg') }}" />
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
              <span class="text-sm">Av. Honorio Delgado 169, San Martín de Porres 15102.</span>
            </div>
            <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
              <span class="material-symbols-outlined text-lg text-gray-400">schedule</span>
              <span class="text-sm">Lun-Vie, 9:00 AM - 6:00 PM</span>
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

{{-- SCRIPT GENERAL --}}
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

  /* CARRUSEL ALUMNOS (si existe en tu home) */
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