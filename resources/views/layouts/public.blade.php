<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'PROMUBE CIDECH')</title>

    {{-- Tailwind + JS de Laravel (Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Fuentes y Material Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    />

    <style>
        .material-symbols-outlined {
            font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 24;
        }
    </style>
</head>

<body class="font-display bg-background-light dark:bg-background-dark">
<div class="relative flex min-h-screen w-full flex-col">

    {{-- Header --}}
    <header class="sticky top-0 z-50 w-full bg-primary font-display shadow-md">
        <div class="container mx-auto flex h-16 max-w-6xl items-center justify-between px-4">
            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <h1 class="text-2xl font-bold tracking-tight text-white">PROMUBE</h1>
                    <span class="hidden border-l border-white/50 pl-3 text-sm font-light text-white sm:inline">
                        CIDECH
                    </span>
                </a>
            </div>

            {{-- Navegación Principal (Limpia) --}}
            <nav class="hidden items-center gap-6 md:flex">
                <a href="{{ route('home') }}"
                   class="text-sm font-medium text-white transition-colors hover:text-white/80">
                    Inicio
                </a>
                <a href="{{ route('becas.index') }}"
                   class="text-sm font-medium text-white transition-colors hover:text-white/80">
                    Becas
                </a>
                <a href="{{ route('beneficiados.index') }}"
                   class="text-sm font-medium text-white transition-colors hover:text-white/80">
                    Beneficiados
                </a>
                <a href="{{ route('sedes.index') }}"
                   class="text-sm font-medium text-white transition-colors hover:text-white/80">
                    Sedes
                </a>
                <a href="{{ route('contacto.index') }}"
                   class="text-sm font-medium text-white transition-colors hover:text-white/80">
                    Contacto
                </a>
            </nav>

            {{-- Botón menú móvil --}}
            <button class="md:hidden rounded p-1.5 text-white transition-colors hover:bg-white/20">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </header>

    {{-- Contenido --}}
    <main class="flex-grow">
        {{-- Quitamos padding-top/bottom excesivo si el diseño lo requiere, 
             pero mantenemos el contenedor base --}}
        <div class="mx-auto w-full"> 
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="w-full bg-[#212121] text-white font-display">
        <div class="mx-auto max-w-6xl px-4 py-10">
            <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-3 md:text-left">
                
                {{-- Columna 1: Info --}}
                <div class="flex flex-col items-center md:items-start">
                    <h3 class="mb-2 text-lg font-bold">PROMUBE</h3>
                    <p class="text-sm text-gray-400">
                        Promoviendo la educación y el futuro a través de becas y oportunidades para la comunidad,
                        en colaboración con el Centro de Investigación y Desarrollo de Capacidades Humanas (CIDECH).
                    </p>
                </div>

                {{-- Columna 2: Contacto --}}
                <div class="flex flex-col items-center">
                    <h3 class="mb-2 text-lg font-bold">Contacto</h3>
                    <div class="flex flex-col gap-2 text-sm text-gray-400">
                        <a href="mailto:contacto@cidech.com"
                           class="flex items-center gap-2 transition-colors hover:text-white">
                            <span class="material-symbols-outlined text-base">mail</span>
                            contacto@cidech.com
                        </a>
                        <a href="#"
                           class="flex items-center gap-2 transition-colors hover:text-white">
                            <span class="material-symbols-outlined text-base">chat</span>
                            WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Columna 3: Redes --}}
                <div class="flex flex-col items-center md:items-end">
                    <h3 class="mb-2 text-lg font-bold">Síguenos</h3>
                    <div class="flex gap-4">
                        <a href="#" aria-label="Facebook"
                           class="text-gray-400 transition-colors hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="TikTok"
                           class="text-gray-400 transition-colors hover:text-white">
                            <span class="material-symbols-outlined text-base">music_note</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-700 pt-6 text-center text-sm text-gray-400">
                <p>© {{ date('Y') }} PROMUBE CIDECH. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>