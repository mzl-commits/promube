{{-- resources/views/layouts/public.blade.php --}}
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        /* Color Brand Red (#ef233c) forzado */
        .bg-primary { background-color: #ef233c !important; }
        .text-primary { color: #ef233c !important; }
        .border-primary { border-color: #ef233c !important; }
    </style>
</head>

<body class="font-display bg-background-light dark:bg-background-dark flex flex-col min-h-screen">

    {{-- Header Robusto y Notorio --}}
    <header class="sticky top-0 z-50 w-full bg-primary shadow-xl transition-all duration-300">
        <div class="container mx-auto flex h-24 max-w-7xl items-center justify-between px-6 lg:px-8">
            
            {{-- Logo con mayor presencia --}}
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                    {{-- Icono en caja semitransparente --}}
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 text-white backdrop-blur-sm transition-transform duration-300 group-hover:scale-110 group-hover:bg-white group-hover:text-primary">
                        <span class="material-symbols-outlined text-3xl">school</span>
                    </div>
                    
                    {{-- Texto Logo --}}
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-black tracking-tight text-white leading-none">PROMUBE</h1>
                        <span class="text-xs font-bold text-white/90 tracking-[0.2em] uppercase mt-1">CIDECH</span>
                    </div>
                </a>
            </div>

            {{-- Navegación Principal --}}
            <nav class="hidden items-center gap-10 md:flex">
                <a href="{{ route('home') }}"
                   class="text-base font-bold text-white transition-all hover:text-white/80 hover:scale-105">
                    Inicio
                </a>
                <a href="{{ route('becas.index') }}"
                   class="text-base font-bold text-white transition-all hover:text-white/80 hover:scale-105">
                    Becas
                </a>
                <a href="{{ route('beneficiados.index') }}"
                   class="text-base font-bold text-white transition-all hover:text-white/80 hover:scale-105">
                    Beneficiados
                </a>
                <a href="{{ route('sedes.index') }}"
                   class="text-base font-bold text-white transition-all hover:text-white/80 hover:scale-105">
                    Sedes
                </a>
                
                {{-- Botón Contacto --}}
                <a href="{{ route('contacto.index') }}"
                   class="rounded-full bg-white px-6 py-2.5 text-base font-bold text-primary shadow-lg transition-all hover:bg-gray-100 hover:shadow-xl hover:-translate-y-0.5">
                    Contacto
                </a>
            </nav>

            {{-- Botón menú móvil --}}
            <button class="md:hidden rounded-lg p-2 text-white transition-colors hover:bg-white/20">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>
    </header>

    {{-- Contenido Principal --}}
    <main class="flex-grow">
        <div class="w-full">
            @yield('content')
        </div>
    </main>

    {{-- Footer solo en negro --}}
    <footer class="w-full bg-[#1a1a1a] text-white font-display border-t-4 border-primary">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
                
                {{-- Columna 1: Info --}}
                <div class="flex flex-col items-center md:items-start space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary text-4xl">school</span>
                        <div>
                            <h3 class="text-2xl font-black tracking-tight">PROMUBE</h3>
                            <p class="text-xs font-bold text-gray-400 tracking-widest uppercase">CIDECH</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-center md:text-left leading-relaxed">
                        Promoviendo la educación y el futuro a través de becas y oportunidades para la comunidad.
                    </p>
                </div>

                {{-- Columna 2: Enlaces Rápidos --}}
                <div class="flex flex-col items-center md:items-center">
                    <h3 class="mb-6 text-lg font-bold text-white uppercase tracking-wider">Enlaces Rápidos</h3>
                    <ul class="flex flex-col gap-3 text-gray-400 text-center">
                        <li><a href="{{ route('becas.index') }}" class="hover:text-primary transition-colors">Buscar Becas</a></li>
                        <li><a href="{{ route('sedes.index') }}" class="hover:text-primary transition-colors">Nuestras Sedes</a></li>
                        <li><a href="{{ route('beneficiados.index') }}" class="hover:text-primary transition-colors">Historias de Éxito</a></li>
                    </ul>
                </div>

                {{-- Columna 3: Contacto --}}
                <div class="flex flex-col items-center md:items-end">
                    <h3 class="mb-6 text-lg font-bold text-white uppercase tracking-wider">Contáctanos</h3>
                    <div class="flex flex-col gap-4 text-gray-400 items-center md:items-end">
                        <a href="mailto:contacto@cidech.com" class="flex items-center gap-3 hover:text-primary transition-colors group">
                            <span>contacto@cidech.com</span>
                            <span class="material-symbols-outlined group-hover:scale-110 transition-transform">mail</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 hover:text-primary transition-colors group">
                            <span>+52 55 1234 5678</span>
                            <span class="material-symbols-outlined group-hover:scale-110 transition-transform">call</span>
                        </a>
                    </div>
                    
                    {{-- Redes Sociales --}}
                    <div class="flex gap-4 mt-6">
                        <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full bg-gray-800 text-white hover:bg-primary transition-all">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full bg-gray-800 text-white hover:bg-primary transition-all">
                            <span class="material-symbols-outlined text-lg">music_note</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-gray-800 pt-8 text-center text-sm text-gray-500">
                <p>© {{ date('Y') }} PROMUBE CIDECH. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>
