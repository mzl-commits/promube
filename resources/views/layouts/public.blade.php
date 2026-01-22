{{-- resources/views/layouts/public.blade.php --}}
<!DOCTYPE html>
<html class="light" lang="es">
<head>
    {{-- =========================================
       META BÁSICO
       - charset + viewport para responsive
       - theme-color para color del navegador en móvil
       - title configurable por @yield
    ========================================== --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#ef233c" />
    <title>@yield('title', 'PROMUBE CIDECH')</title>

    {{-- =========================================
       ASSETS CON VITE
       - app.css: Tailwind + estilos globales
       - app.js: scripts de la app
       Nota: si en hosting no se compila, por eso agregamos CSS crítico aquí
    ========================================== --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- =========================================
       FUENTES E ICONOS
       - Public Sans: tipografía base
       - Material Symbols: íconos (menu, mail, call, etc.)
    ========================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <style>
        /* =========================================
           TOKENS DE MARCA
           - variables reutilizables en toda la vista
           - evita repetir colores y opacidades
        ========================================== */
        :root{
            --brand-red: #ef233c;
            --footer-card: rgba(255,255,255,.04);
            --footer-border: rgba(255,255,255,.10);
        }

        /* Scroll suave para #top */
        html{ scroll-behavior: smooth; }

        /* Configuración de Material Symbols */
        .material-symbols-outlined{
            font-variation-settings: 'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24;
        }

        /* =========================================
           UTILIDADES DE MARCA (override)
           - garantiza que bg/text/border-primary sean el rojo oficial
        ========================================== */
        .bg-primary{ background-color: var(--brand-red) !important; }
        .text-primary{ color: var(--brand-red) !important; }
        .border-primary{ border-color: var(--brand-red) !important; }

        /* =========================================
           HEADER: NAV DESKTOP
           - separación controlada del menú
           - underline animado en hover/active
        ========================================== */
        .site-nav{
            display:flex;
            align-items:center;
            gap: 2.5rem;
        }

        .nav-link{
            position:relative;
            display:inline-flex;
            align-items:center;
            font-weight: 900;
            color: rgba(255,255,255,.95);
            padding: .35rem 0;
            transition: opacity .2s ease, transform .2s ease;
            white-space: nowrap;
            letter-spacing: .01em;
        }
        .nav-link:hover{
            opacity: .85;
            transform: translateY(-1px);
        }
        .nav-link::after{
            content:"";
            position:absolute;
            left:0;
            bottom:-.65rem;
            height:3px;
            width:0;
            border-radius:999px;
            background: rgba(255,255,255,.85);
            transition: width .22s ease;
        }
        .nav-link:hover::after{ width:100%; }
        .nav-link.is-active::after{ width:100%; }

        /* =========================================
           LOGO BADGE
           - tarjeta del ícono del logo con blur
           - hover: pasa a fondo blanco y el ícono se vuelve rojo
        ========================================== */
        .logo-badge{
            display:flex;
            align-items:center;
            justify-content:center;
            height:48px;
            width:48px;
            border-radius:14px;
            background: rgba(255,255,255,.20);
            color:#fff;
            backdrop-filter: blur(8px);
            transition: transform .25s ease, background .25s ease, color .25s ease;
        }
        .logo-wrap:hover .logo-badge{
            transform: scale(1.08);
            background: rgba(255,255,255,.98);
            color: var(--brand-red);
        }

        /* =========================================
           MENÚ MÓVIL
           - panel rojo con blur
           - enlaces tipo botón con borde y hover
        ========================================== */
        .mobile-panel{
            border-top: 1px solid rgba(255,255,255,.18);
            background: rgba(239,35,60,.96);
            backdrop-filter: blur(10px);
        }

        .mobile-link{
            display:flex;
            align-items:center;
            justify-content: space-between;
            width:100%;
            padding: .9rem 1rem;
            border-radius:14px;
            font-weight:900;
            color:#fff;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.14);
            transition: transform .2s ease, background .2s ease;
        }
        .mobile-link:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,.14);
        }

        .mobile-cta{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:.6rem;
            width:100%;
            padding: .95rem 1rem;
            border-radius:999px;
            font-weight:900;
            color: var(--brand-red);
            background:#fff;
            transition: transform .2s ease, background .2s ease;
        }
        .mobile-cta:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,.92);
        }

        /* =========================================
           FOOTER
           - glow superior rojo
           - aire superior/inferior independiente de Tailwind
           - grid controlado para evitar choques entre columnas
        ========================================== */
        .footer-wrap{
            position: relative;
            overflow: hidden;
            margin-top: 1rem; /* separa el footer del contenido anterior */
        }

        .footer-wrap::before{
            content:"";
            position:absolute;
            left:0; right:0;
            top:-70px;
            height:140px;
            background: radial-gradient(closest-side, rgba(239,35,60,.55), transparent 72%);
            filter: blur(12px);
            pointer-events:none;
        }

        /* Aire real del footer (no depende de Tailwind) */
        .footer-inner{
            padding-top: 4rem;
            padding-bottom: 5rem;
        }
        @media (min-width: 768px){
            .footer-inner{
                padding-top: 4rem;
                padding-bottom: 2rem;
            }
        }

        /* Títulos del footer (estilo consistente) */
        .footer-title{
            font-weight: 900;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-size: .85rem;
            color: rgba(255,255,255,.92);
        }

        /* Links del footer (hover sutil) */
        .footer-link{
            display:inline-flex;
            align-items:center;
            gap:.55rem;
            color: rgba(148,163,184,.95);
            font-weight: 800;
            transition: color .2s ease, transform .2s ease;
        }
        .footer-link:hover{
            color:#fff;
            transform: translateX(2px);
        }

        /* Tarjetas del footer (Horario) */
        .footer-card{
            background: var(--footer-card);
            border: 1px solid var(--footer-border);
            border-radius: 1.35rem;
            padding: 1.25rem 1.35rem;
            box-shadow: 0 26px 70px -60px rgba(0,0,0,.9);
        }

        /* Pills (Contacto) */
        .footer-pill{
            display:flex;
            align-items:center;
            gap:.85rem;
            padding:.95rem 1.05rem;
            border-radius:999px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.10);
            transition: transform .18s ease, background .18s ease, border-color .18s ease;
        }
        .footer-pill:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,.08);
            border-color: rgba(255,255,255,.14);
        }

        /* =========================================
           FOOTER GRID CONTROLADO
           - col 2 centrada y con ancho controlado
           - col 3 con menos separación vertical
        ========================================== */
        .footer-grid{
            display:grid;
            grid-template-columns: 1fr;
            gap: 4rem; /* móvil */
            align-items:start;
        }
        @media (min-width: 768px){
            .footer-grid{
                grid-template-columns: 1.15fr 0.85fr 1fr;
                column-gap: 5rem;
                row-gap: 0;
            }
        }

        .footer-col-links{
            width: 100%;
            max-width: 15rem; /* evita que “estire” y se pegue a la derecha */
        }
        @media (min-width: 768px){
            .footer-col-links{
                justify-self: center; /* centra la columna 2 dentro de su celda */
            }
        }

        .footer-col-right{
            display:flex;
            flex-direction:column;
            gap: 1.75rem; /* reduce el espacio entre Horario y Contacto */
        }
        @media (min-width: 768px){
            .footer-col-right{
                align-items:flex-end; /* alinea a la derecha en desktop */
                gap: 2rem;
            }
        }

        /* Botones sociales */
        .social-btn{
            height:44px;
            width:44px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:999px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.10);
            color:#fff;
            transition: transform .2s ease, background .2s ease, border-color .2s ease;
        }
        .social-btn:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.16);
        }

        /* =========================================
           BOTTOM BAR
           - copyright + botón volver arriba
           - en móvil apila, en desktop distribuye
        ========================================== */
        .footer-bottom{
            display:flex;
            flex-direction:column;
            gap: 1rem;
        }
        @media (min-width: 768px){
            .footer-bottom{
                flex-direction:row;
                align-items:center;
                justify-content:space-between;
                gap: 1.25rem;
            }
        }

        .backtop-btn{
            display:inline-flex;
            align-items:center;
            gap:.55rem;
            padding:.65rem 1.05rem;
            border-radius:999px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.10);
            color: rgba(255,255,255,.92);
            font-weight: 900;
            transition: transform .2s ease, background .2s ease, border-color .2s ease;
            white-space: nowrap;
            flex-shrink: 0;
            align-self: flex-end; /* móvil: se alinea a la derecha */
        }
        .backtop-btn:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.18);
        }
    </style>

    {{-- Permite que cada vista agregue estilos/scripts en el head --}}
    @stack('head')
</head>

<body id="top" class="font-display bg-background-light dark:bg-background-dark flex flex-col min-h-screen antialiased">

    {{-- =========================================
       HEADER
       - sticky fijo arriba
       - desktop: nav horizontal + botón aula virtual
       - móvil: botón menú que despliega panel
    ========================================== --}}
    <header class="sticky top-0 z-50 w-full bg-primary shadow-xl transition-all duration-300">
        <div class="container mx-auto flex h-24 max-w-7xl items-center justify-between px-6 lg:px-8">

            {{-- Logo: vuelve al home --}}
            <a href="{{ route('home') }}" class="logo-wrap flex items-center gap-4 group">
                <div class="logo-badge" aria-hidden="true">
                    <span class="material-symbols-outlined text-3xl">school</span>
                </div>

                <div class="flex flex-col">
                    <h1 class="text-3xl font-black tracking-tight text-white leading-none">PROMUBE</h1>
                    <span class="text-xs font-extrabold text-white/90 tracking-[0.22em] uppercase mt-1">CIDECH</span>
                </div>
            </a>

            {{-- Navegación principal (solo desktop) --}}
            <nav class="hidden md:flex site-nav" aria-label="Navegación principal">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Inicio</a>
                <a href="{{ route('becas.index') }}" class="nav-link {{ request()->routeIs('becas.*') ? 'is-active' : '' }}">Becas</a>
                <a href="{{ route('sedes.index') }}" class="nav-link {{ request()->routeIs('sedes.*') ? 'is-active' : '' }}">Sedes</a>

                {{-- CTA externo --}}
                <a href="https://muni.cidech.edu.pe/"
                   class="inline-flex items-center gap-3 rounded-full bg-white px-6 py-2.5 text-base font-black text-primary shadow-lg transition-all hover:bg-gray-100 hover:shadow-xl hover:-translate-y-0.5">
                    Aula virtual
                    <span class="material-symbols-outlined text-xl">arrow_forward</span>
                </a>
            </nav>

            {{-- Botón del menú móvil --}}
            <button id="mobileMenuBtn" type="button"
                    class="md:hidden rounded-xl p-2 text-white transition-colors hover:bg-white/20"
                    aria-label="Abrir menú" aria-expanded="false" aria-controls="mobileMenu">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>

        {{-- Panel desplegable móvil (se muestra/oculta por JS) --}}
        <div id="mobileMenu" class="md:hidden hidden mobile-panel">
            <div class="container mx-auto max-w-7xl px-6 py-4 space-y-3">
                <a href="{{ route('home') }}" class="mobile-link">
                    <span>Inicio</span><span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="{{ route('becas.index') }}" class="mobile-link">
                    <span>Becas</span><span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="{{ route('sedes.index') }}" class="mobile-link">
                    <span>Sedes</span><span class="material-symbols-outlined">arrow_forward</span>
                </a>

                <a href="https://muni.cidech.edu.pe/" class="mobile-cta">
                    Aula virtual <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
        </div>
    </header>

    {{-- =========================================
       CONTENIDO PRINCIPAL
       - aquí renderiza cada vista con @yield('content')
    ========================================== --}}
    <main class="flex-grow">
        <div class="w-full">
            @yield('content')
        </div>
    </main>

    {{-- =========================================
       FOOTER
       - 3 columnas: marca, enlaces, horario/contacto
       - bottom bar: copyright + volver arriba
    ========================================== --}}
    <footer class="footer-wrap w-full bg-[#1a1a1a] text-white font-display border-t-4 border-primary">
        <div class="footer-inner relative mx-auto max-w-7xl px-6 z-[1]">

            {{-- Grid principal del footer --}}
            <div class="footer-grid">

                {{-- Columna 1: marca + descripción + redes --}}
                <div class="flex flex-col gap-8">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary text-4xl">school</span>
                        <div class="leading-tight">
                            <h3 class="text-2xl font-black tracking-tight">PROMUBE</h3>
                            <p class="text-xs font-extrabold text-white/80 tracking-widest uppercase">CIDECH</p>
                        </div>
                    </div>

                    <p class="text-[1.05rem] leading-relaxed text-white/55 max-w-md">
                        Promoviendo la educación y el futuro a través de becas y oportunidades para la comunidad.
                    </p>

                    <div class="flex gap-3">
                        <a href="#" class="social-btn" aria-label="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>

                        <a href="#" class="social-btn" aria-label="TikTok">
                            <span class="material-symbols-outlined text-lg">music_note</span>
                        </a>
                    </div>
                </div>

                {{-- Columna 2: enlaces rápidos (centrada en desktop) --}}
                <div class="footer-col-links flex flex-col">
                    <p class="footer-title mb-2">Enlaces rápidos</p>
                    <ul class="space-y-4">
                        <li><a href="{{ route('becas.index') }}" class="footer-link">Buscar Becas</a></li>
                        <li><a href="{{ route('sedes.index') }}" class="footer-link">Nuestras Sedes</a></li>
                    </ul>
                </div>

                {{-- Columna 3: tarjetas de horario y contacto (compactadas) --}}
                <div class="footer-col-right">
                    <div class="footer-card w-full md:w-[20rem]">
                        <p class="footer-title mb-4">Horario</p>
                        <p class="text-white/85 font-extrabold text-lg">
                            Lun–Vie: 9:00 AM – 6:00 PM
                        </p>
                    </div>

                    <div class="w-full md:w-[20rem]">
                        <p class="footer-title mb-6">Contacto</p>
                        <div class="space-y-4">
                            <a href="mailto:contacto@cidech.com" class="footer-pill">
                                <span class="material-symbols-outlined text-xl">mail</span>
                                <span class="font-extrabold text-white/90">contacto@cidech.com</span>
                            </a>

                            <a href="tel:921810356" class="footer-pill">
                                <span class="material-symbols-outlined text-xl">call</span>
                                <span class="font-extrabold text-white/90">921 810 356</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Barra inferior: separación reducida para que no se sienta “pegada” --}}
            <div class="mt-10 border-t border-white/10 pt-5 footer-bottom">
                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} PROMUBE CIDECH. Todos los derechos reservados.
                </p>

                <a href="#top" class="backtop-btn" aria-label="Volver arriba">
                    Volver arriba
                    <span class="material-symbols-outlined text-lg">arrow_upward</span>
                </a>
            </div>
        </div>
    </footer>

    {{-- =========================================
       JS DEL MENÚ MÓVIL
       - toggle al hacer click en el botón
       - cierre automático al hacer click fuera
    ========================================== --}}
    <script>
        (function () {
            const btn = document.getElementById('mobileMenuBtn');
            const panel = document.getElementById('mobileMenu');
            if (!btn || !panel) return;

            btn.addEventListener('click', () => {
                const isOpen = !panel.classList.contains('hidden');
                panel.classList.toggle('hidden');
                btn.setAttribute('aria-expanded', String(!isOpen));
            });

            document.addEventListener('click', (e) => {
                if (panel.classList.contains('hidden')) return;
                if (panel.contains(e.target) || btn.contains(e.target)) return;
                panel.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            });
        })();
    </script>

    {{-- Permite que cada vista agregue scripts al final --}}
    @stack('scripts')
</body>
</html>
