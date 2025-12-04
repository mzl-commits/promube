@extends('layouts.public')

@section('title', 'Sedes y cobertura - PROMUBE')

@section('content')
    <style>
        /* =========================================
           CONFIGURACIÓN DE COLOR (#EF233C)
           ========================================= */
        :root {
            --brand-red: #ef233c; 
            /* RGB: 239, 35, 60 para opacidades */
            --brand-red-light: rgba(239, 35, 60, 0.08);
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
        }

        /* Overrides locales para forzar el color de marca */
        .text-primary { color: var(--brand-red) !important; }
        .bg-primary { background-color: var(--brand-red) !important; }
        .border-primary { border-color: var(--brand-red) !important; }

        /* Animaciones */
        .fade-enter { animation: fadeIn 0.5s var(--ease-out-expo) forwards; }
        @keyframes fadeIn { 
            from { opacity: 0; transform: translateY(20px); filter: blur(5px); } 
            to { opacity: 1; transform: translateY(0); filter: blur(0); } 
        }

        /* ESTILO DE TABS (PESTAÑAS) */
        .tab-btn {
            position: relative;
            transition: all 0.3s ease;
            color: #64748b; /* Gris neutro */
            background: transparent;
            font-weight: 700;
            letter-spacing: 0.02em;
        }
        
        .tab-btn:hover {
            color: var(--brand-red);
            background-color: var(--brand-red-light);
        }

        /* Línea inferior animada */
        .tab-btn::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 0; width: 100%; height: 3px;
            background: var(--brand-red);
            transform: scaleX(0);
            transition: transform 0.3s var(--ease-out-expo);
            transform-origin: center;
        }

        /* Estado Activo */
        .tab-btn.active {
            color: var(--brand-red);
            background-color: var(--brand-red-light);
        }
        .tab-btn.active::after {
            transform: scaleX(1);
        }

        /* TARJETAS DE INFO */
        .sede-card {
            border: 1px solid rgba(239, 35, 60, 0.08); /* Borde rojo muy sutil */
            transition: all 0.4s var(--ease-out-expo);
            overflow: hidden;
        }
        .sede-card:hover {
            box-shadow: 0 20px 40px -10px rgba(239, 35, 60, 0.15); /* Sombra roja vibrante */
            border-color: rgba(239, 35, 60, 0.4);
            transform: translateY(-5px);
        }

        /* Iconos con fondo rojo suave */
        .icon-box {
            background-color: var(--brand-red-light);
            color: var(--brand-red);
            transition: all 0.3s ease;
        }
        .sede-card:hover .icon-box {
            background-color: var(--brand-red);
            color: white;
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 0 10px 20px -5px rgba(239, 35, 60, 0.4);
        }

        /* Botón de contacto */
        .btn-contact {
            background-color: #1e293b; /* Oscuro por defecto */
            color: white;
            transition: all 0.3s ease;
        }
        .btn-contact:hover {
            background-color: var(--brand-red);
            box-shadow: 0 10px 20px -5px rgba(239, 35, 60, 0.4);
            transform: translateY(-2px);
        }
        
        /* Iframe Mapa */
        .map-container {
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .map-container:hover {
            border-color: var(--brand-red);
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1);
        }
    </style>

    <div class="container mx-auto px-6 py-12 min-h-[80vh]">
        
        {{-- HEADER --}}
        <div class="flex flex-col items-center text-center mb-16 animate-fade-in-up">
            <span class="font-bold tracking-widest uppercase text-xs mb-3 block" style="color: var(--brand-red);">Cobertura Nacional</span>
            <h1 class="text-gray-900 dark:text-white text-4xl md:text-5xl font-black leading-tight tracking-tight mb-6">
                Sedes y Cobertura
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-lg md:text-xl font-normal leading-relaxed max-w-3xl">
                PROMUBE – CIDECH opera en diferentes regiones del país para estar más cerca de ti. 
                <span class="font-bold" style="color: var(--brand-red);">Encuentra tu sede más cercana</span> y comienza tu camino.
            </p>
        </div>

        {{-- 1. SELECTOR DE SEDES (TABS ESTILIZADOS) --}}
        <div class="flex flex-wrap justify-center gap-2 mb-12 border-b border-gray-200 dark:border-gray-700 pb-1" id="tabs-container">
            <button onclick="switchSede('central')" id="tab-central" 
                    class="tab-btn active px-8 py-4 text-lg rounded-t-xl">
                Sede Central (CDMX)
            </button>
            <button onclick="switchSede('norte')" id="tab-norte" 
                    class="tab-btn px-8 py-4 text-lg rounded-t-xl">
                Sede Norte (Monterrey)
            </button>
            <button onclick="switchSede('sur')" id="tab-sur" 
                    class="tab-btn px-8 py-4 text-lg rounded-t-xl">
                Sede Sur (Guadalajara)
            </button>
        </div>

        {{-- 2. CONTENIDO (INFORMACIÓN + MAPA) --}}
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-start">
            
            {{-- COLUMNA IZQUIERDA: INFORMACIÓN (Dinámica) --}}
            <div class="w-full lg:w-1/3">
                
                {{-- Info: Central --}}
                <div id="info-central" class="sede-info fade-enter">
                    <div class="sede-card bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-xl shadow-gray-200/50 dark:shadow-none">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="icon-box p-4 rounded-2xl">
                                <span class="material-symbols-outlined text-3xl">apartment</span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Central</h2>
                                <span class="font-bold uppercase text-sm tracking-wider" style="color: var(--brand-red);">Ciudad de México</span>
                            </div>
                        </div>
                        
                        <div class="space-y-8">
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">location_on</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Dirección</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium">Av. Universidad 1234, Col. Centro.<br>Alcaldía Benito Juárez.</p>
                                </div>
                            </div>
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">schedule</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Horario</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium">Lun - Vie: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">call</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Contacto</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">+52 55 1234 5678</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="#" class="btn-contact flex items-center justify-center gap-2 w-full py-4 rounded-xl font-bold">
                                <span class="material-symbols-outlined text-sm">mail</span>
                                Contactar Sede
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Info: Norte --}}
                <div id="info-norte" class="sede-info hidden">
                    <div class="sede-card bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-xl shadow-gray-200/50 dark:shadow-none">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="icon-box p-4 rounded-2xl">
                                <span class="material-symbols-outlined text-3xl">business</span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Norte</h2>
                                <span class="font-bold uppercase text-sm tracking-wider" style="color: var(--brand-red);">Monterrey, N.L.</span>
                            </div>
                        </div>
                        
                        <div class="space-y-8">
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">location_on</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Dirección</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium">Calle del Sol 567, Plaza Norte.<br>Monterrey, Nuevo León.</p>
                                </div>
                            </div>
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">schedule</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Horario</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium">Lun - Vie: 10:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">call</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Contacto</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">+52 81 8765 4321</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="#" class="btn-contact flex items-center justify-center gap-2 w-full py-4 rounded-xl font-bold">
                                <span class="material-symbols-outlined text-sm">mail</span>
                                Contactar Sede
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Info: Sur --}}
                <div id="info-sur" class="sede-info hidden">
                    <div class="sede-card bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-xl shadow-gray-200/50 dark:shadow-none">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="icon-box p-4 rounded-2xl">
                                <span class="material-symbols-outlined text-3xl">store</span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Sede Sur</h2>
                                <span class="font-bold uppercase text-sm tracking-wider" style="color: var(--brand-red);">Guadalajara, Jal.</span>
                            </div>
                        </div>
                        
                        <div class="space-y-8">
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">location_on</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Dirección</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium">Av. Vallarta 999, Zona Minerva.<br>Guadalajara, Jalisco.</p>
                                </div>
                            </div>
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">schedule</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Horario</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium">Lun - Vie: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                            <div class="flex gap-4 group">
                                <span class="material-symbols-outlined text-gray-400 mt-1 group-hover:text-primary transition-colors">call</span>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Contacto</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">+52 33 1122 3344</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="#" class="btn-contact flex items-center justify-center gap-2 w-full py-4 rounded-xl font-bold">
                                <span class="material-symbols-outlined text-sm">mail</span>
                                Contactar Sede
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- COLUMNA DERECHA: MAPA DINÁMICO --}}
            <div class="w-full lg:w-2/3 map-container relative h-[600px] rounded-3xl overflow-hidden shadow-2xl bg-gray-100 dark:bg-gray-800">
                <iframe id="map-frame" 
                        class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.536968037677!2d-99.1653244850934!3d19.42702498688748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de02ff7!2sEl%20%C3%81ngel%20de%20la%20Independencia!5e0!3m2!1ses-419!2smx" 
                        style="border:0; opacity: 1; transition: opacity 0.5s ease;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
                {{-- Overlay de carga --}}
                <div id="map-loader" class="absolute inset-0 bg-white dark:bg-gray-800 flex items-center justify-center pointer-events-none opacity-0 transition-opacity duration-300">
                    <div class="animate-spin rounded-full h-12 w-12 border-4 border-gray-200 border-t-primary" style="border-top-color: var(--brand-red);"></div>
                </div>
            </div>

        </div>
    </div>

    {{-- SCRIPT: Lógica de cambio de pestaña y mapa --}}
    <script>
        const maps = {
            'central': 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.536968037677!2d-99.1653244850934!3d19.42702498688748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de02ff7!2sEl%20%C3%81ngel%20de%20la%20Independencia!5e0!3m2!1ses-419!2smx', 
            'norte': 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3596.536968037677!2d-100.3161!3d25.6866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662958742261da1%3A0x367207c927c30d93!2sMacroplaza!5e0!3m2!1ses-419!2smx', 
            'sur': 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.536968037677!2d-103.3496!3d20.6736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1e70e9d6d5d%3A0x70483863777d040!2sLa%20Minerva!5e0!3m2!1ses-419!2smx' 
        };

        function switchSede(sedeId) {
            // 1. Actualizar Botones (Tabs)
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            const btn = document.getElementById('tab-' + sedeId);
            if(btn) btn.classList.add('active');

            // 2. Actualizar Información (Columna Izquierda)
            document.querySelectorAll('.sede-info').forEach(info => {
                info.classList.add('hidden');
                info.classList.remove('fade-enter');
            });
            
            const selectedInfo = document.getElementById('info-' + sedeId);
            if(selectedInfo) {
                selectedInfo.classList.remove('hidden');
                void selectedInfo.offsetWidth; // Trigger reflow para reiniciar animación
                selectedInfo.classList.add('fade-enter');
            }

            // 3. Actualizar Mapa (Columna Derecha)
            const mapFrame = document.getElementById('map-frame');
            const loader = document.getElementById('map-loader');

            if (mapFrame.src !== maps[sedeId]) {
                mapFrame.style.opacity = '0.5';
                loader.style.opacity = '1';
                
                setTimeout(() => {
                    mapFrame.src = maps[sedeId];
                    mapFrame.onload = () => {
                        mapFrame.style.opacity = '1';
                        loader.style.opacity = '0';
                    };
                }, 200);
            }
        }

        // Detectar Hash en URL para activar pestaña correcta al cargar
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash.replace('#', '');
            if (hash && ['central', 'norte', 'sur'].includes(hash)) {
                setTimeout(() => {
                    switchSede(hash);
                    document.getElementById('tabs-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }
        });
    </script>
@endsection