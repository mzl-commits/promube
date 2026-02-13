{{-- resources/views/layouts/public.blade.php --}}
<!DOCTYPE html>
<html class="light" lang="es">
<head>
    {{-- =========================================
       META BÁSICO
    ========================================== --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#ef233c" />
    <title>@yield('title', 'PROMUBE CIDECH')</title>

    {{-- =========================================
       ASSETS CON VITE
    ========================================== --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- =========================================
       FUENTES E ICONOS
    ========================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <style>
        /* =========================================
           TOKENS DE MARCA
        ========================================== */
        :root{
            --brand-red: #ef233c;
            --footer-card: rgba(255,255,255,.04);
            --footer-border: rgba(255,255,255,.10);
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
        }

        html{ scroll-behavior: smooth; }

        .material-symbols-outlined{
            font-variation-settings: 'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24;
        }

        .bg-primary{ background-color: var(--brand-red) !important; }
        .text-primary{ color: var(--brand-red) !important; }
        .border-primary{ border-color: var(--brand-red) !important; }

        /* =========================================
           HEADER: NAV DESKTOP
           OJO: NO ponemos display:flex aquí porque pisa el "hidden" de Tailwind en móvil
        ========================================== */
        .site-nav{
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
           MENÚ MÓVIL (panel animado + overlay)
        ========================================== */
        .mobile-panel{
            border-top: 1px solid rgba(255,255,255,.18);
            background: rgba(239,35,60,.96);
            backdrop-filter: blur(10px);

            position: absolute;
            left: 0;
            right: 0;
            top: 100%;

            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transform: translateY(-8px);
            pointer-events: none;

            transition:
                max-height .45s var(--ease-out-expo),
                opacity .2s ease,
                transform .2s ease;
        }
        .mobile-panel.is-open{
            max-height: 520px;
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .mobile-backdrop{
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.38);
            backdrop-filter: blur(2px);
            z-index: 40; /* debajo del header (z-50) */
        }

        @media (prefers-reduced-motion: reduce){
            .mobile-panel{ transition: none; }
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
        ========================================== */
        .footer-wrap{
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
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

        .footer-title{
            font-weight: 900;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-size: .85rem;
            color: rgba(255,255,255,.92);
        }

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

        .footer-card{
            background: var(--footer-card);
            border: 1px solid var(--footer-border);
            border-radius: 1.35rem;
            padding: 1.25rem 1.35rem;
            box-shadow: 0 26px 70px -60px rgba(0,0,0,.9);
        }

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

        .footer-grid{
            display:grid;
            grid-template-columns: 1fr;
            gap: 4rem;
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
            max-width: 15rem;
        }
        @media (min-width: 768px){
            .footer-col-links{
                justify-self: center;
            }
        }

        .footer-col-right{
            display:flex;
            flex-direction:column;
            gap: 1.75rem;
        }
        @media (min-width: 768px){
            .footer-col-right{
                align-items:flex-end;
                gap: 2rem;
            }
        }

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
            align-self: flex-end;
        }
        .backtop-btn:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.18);
        }
    </style>

    @stack('head')
</head>

<body id="top" class="font-display bg-background-light dark:bg-background-dark flex flex-col min-h-screen antialiased">

    {{-- =========================================
       HEADER
    ========================================== --}}
    <header class="sticky top-0 z-50 relative w-full bg-primary shadow-xl transition-all duration-300">
        <div class="container mx-auto flex h-24 max-w-7xl items-center justify-between px-6 lg:px-8">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="logo-wrap flex items-center gap-4 group">
                <div class="logo-badge" aria-hidden="true">
                    <span class="material-symbols-outlined text-3xl">school</span>
                </div>

                <div class="flex flex-col">
                    <h1 class="text-3xl font-black tracking-tight text-white leading-none">PROMUBE</h1>
                    <span class="text-xs font-extrabold text-white/90 tracking-[0.22em] uppercase mt-1">CIDECH</span>
                </div>
            </a>

            {{-- Nav desktop --}}
            <nav class="hidden md:flex items-center site-nav" aria-label="Navegación principal">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Inicio</a>
                <a href="{{ route('becas.index') }}" class="nav-link {{ request()->routeIs('becas.*') ? 'is-active' : '' }}">Becas</a>
                <a href="{{ route('sedes.index') }}" class="nav-link {{ request()->routeIs('sedes.*') ? 'is-active' : '' }}">Sedes</a>

                <a href="https://muni.cidech.edu.pe/"
                   class="inline-flex items-center gap-3 rounded-full bg-white px-6 py-2.5 text-base font-black text-primary shadow-lg transition-all hover:bg-gray-100 hover:shadow-xl hover:-translate-y-0.5">
                    Aula virtual
                    <span class="material-symbols-outlined text-xl">arrow_forward</span>
                </a>
            </nav>

            {{-- Botón menú móvil --}}
            <button id="mobileMenuBtn" type="button"
                    class="md:hidden rounded-xl p-2 text-white transition-colors hover:bg-white/20"
                    aria-label="Abrir menú" aria-expanded="false" aria-controls="mobileMenu">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>

        {{-- Panel móvil animado --}}
        <div id="mobileMenu" class="md:hidden mobile-panel" aria-hidden="true">
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

    {{-- Backdrop --}}
    <div id="mobileBackdrop" class="mobile-backdrop hidden md:hidden" aria-hidden="true"></div>

    {{-- =========================================
       CONTENIDO
    ========================================== --}}
    <main class="flex-grow">
        <div class="w-full">
            @yield('content')
        </div>
    </main>

    {{-- =========================================
       FOOTER
    ========================================== --}}
    <footer class="footer-wrap w-full bg-[#1a1a1a] text-white font-display border-t-4 border-primary">
        <div class="footer-inner relative mx-auto max-w-7xl px-6 z-[1]">

            <div class="footer-grid">
                {{-- Columna 1 --}}
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

                {{-- Columna 2 --}}
                <div class="footer-col-links flex flex-col">
                    <p class="footer-title mb-2">Enlaces rápidos</p>
                    <ul class="space-y-4">
                        <li><a href="{{ route('becas.index') }}" class="footer-link">Buscar Becas</a></li>
                        <li><a href="{{ route('sedes.index') }}" class="footer-link">Nuestras Sedes</a></li>
                    </ul>
                </div>

                {{-- Columna 3 --}}
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
       JS: MENÚ MÓVIL
    ========================================== --}}
    <script>
        (function () {
            const btn = document.getElementById('mobileMenuBtn');
            const panel = document.getElementById('mobileMenu');
            const backdrop = document.getElementById('mobileBackdrop');

            if (!btn || !panel || !backdrop) return;

            const openMenu = () => {
                panel.classList.add('is-open');
                backdrop.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                btn.setAttribute('aria-expanded', 'true');
                panel.setAttribute('aria-hidden', 'false');
            };

            const closeMenu = () => {
                panel.classList.remove('is-open');
                backdrop.classList.add('hidden');
                document.body.style.overflow = '';
                btn.setAttribute('aria-expanded', 'false');
                panel.setAttribute('aria-hidden', 'true');
            };

            btn.addEventListener('click', () => {
                const isOpen = panel.classList.contains('is-open');
                isOpen ? closeMenu() : openMenu();
            });

            backdrop.addEventListener('click', closeMenu);

            panel.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeMenu();
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) closeMenu();
            });
        })();
    </script>

    @stack('scripts')
</body>
</html>
