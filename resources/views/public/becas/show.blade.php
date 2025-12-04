@extends('layouts.public')

@section('title', $beca->titulo . ' - PROMUBE')

@section('content')
    {{-- Estilos específicos para iconos si no cargan por defecto en el layout --}}
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>

    <div class="mt-8 flex flex-col lg:flex-row gap-8 animate-fade-in-up">
        
        {{-- COLUMNA PRINCIPAL (CONTENIDO) --}}
        <div class="flex-grow w-full lg:w-2/3">
            
            <div class="bg-cover bg-center flex flex-col justify-end overflow-hidden rounded-xl min-h-[350px] relative group shadow-lg" 
                 style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 50%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBg8PymSKI3WqL0j_KJBDo7DgRCwApkez7oMNJ-4DXE0870OQlrDSnJ-oTFCXGT0cnbmhkHAvtgHlfVMfssGaBLKqpobcgKNNh2Z0IwiYk1J9D29_csvV7aoFllZJgqD3ipRx806mX4LLAbRP_YeMqYp03QIlHvUHfh5thXRHFcUb8VfuqVurY6dlSoOnolpLWFcgBCFLvniImMuDxAGPw4-g4W3bgYF4T3GYlhKK3tyw9LHGi5sIYKOKViLgZbIJzYKCY-3hbzraQ");'>
                
                <div class="p-6 md:p-8 relative z-10">
                    <div class="flex flex-wrap gap-2 mb-3">
                        @if($beca->tipo)
                            <span class="text-white text-xs font-bold uppercase tracking-wider bg-primary px-3 py-1 rounded-full shadow-sm">
                                {{ $beca->tipo }}
                            </span>
                        @endif
                        @if($beca->area)
                            <span class="text-white text-xs font-bold uppercase tracking-wider bg-black/40 backdrop-blur-md px-3 py-1 rounded-full border border-white/20">
                                {{ $beca->area }}
                            </span>
                        @endif
                    </div>
                    <h1 class="text-white tracking-tight text-3xl md:text-4xl lg:text-5xl font-bold leading-tight drop-shadow-md">
                        {{ $beca->titulo }}
                    </h1>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2 py-6 px-1 text-sm text-gray-500 dark:text-gray-400">
                <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Inicio</a>
                <span>/</span>
                <a class="hover:text-primary transition-colors" href="{{ route('becas.index') }}">Becas</a>
                <span>/</span>
                <span class="text-gray-800 dark:text-gray-200 font-medium truncate max-w-[200px]">{{ $beca->titulo }}</span>
            </div>

            <div class="space-y-10 mt-4">
                
                <div class="prose prose-lg dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-4">Descripción Completa</h2>
                    {{-- nl2br permite respetar los saltos de línea de la base de datos --}}
                    {!! nl2br(e($beca->descripcion)) !!}
                </div>

                @if($beca->beneficios)
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-4">Beneficios y Apoyos</h2>
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-xl border border-blue-100 dark:border-blue-800 text-gray-700 dark:text-gray-300">
                        <ul class="list-disc list-inside space-y-2">
                            {!! nl2br(e($beca->beneficios)) !!}
                        </ul>
                    </div>
                </div>
                @endif

                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-4">Proceso de Postulación</h2>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                        <ol class="list-decimal list-inside space-y-3 text-gray-600 dark:text-gray-300">
                            <li><strong>Revisión:</strong> Lee detenidamente la convocatoria oficial en el enlace proporcionado.</li>
                            <li><strong>Documentación:</strong> Prepara tus documentos (Kardex, Identificación, Comprobante de domicilio).</li>
                            <li><strong>Registro:</strong> Ingresa al sitio oficial de la convocatoria y llena el formulario.</li>
                            <li><strong>Seguimiento:</strong> Mantente atento a tu correo electrónico para los resultados.</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>

        {{-- SIDEBAR LATERAL --}}
        <aside class="w-full lg:w-1/3 lg:sticky top-24 self-start space-y-6">
            
            <div class="bg-white dark:bg-gray-800/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-md">
                <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white mb-5">Información Clave</h2>
                
                <div class="grid grid-cols-1 gap-4">
                    {{-- Nivel --}}
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-background-light dark:bg-black/20 border border-gray-100 dark:border-gray-700/50">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg">
                            <span class="material-symbols-outlined">school</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Nivel Educativo</p>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white">{{ $beca->nivel ?? 'No especificado' }}</h3>
                        </div>
                    </div>

                    {{-- Modalidad --}}
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-background-light dark:bg-black/20 border border-gray-100 dark:border-gray-700/50">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Modalidad</p>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white">{{ $beca->modalidad ?? 'Presencial / Virtual' }}</h3>
                        </div>
                    </div>

                    {{-- País --}}
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-background-light dark:bg-black/20 border border-gray-100 dark:border-gray-700/50">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg">
                            <span class="material-symbols-outlined">public</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Ubicación</p>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white">{{ $beca->pais ?? 'México' }}</h3>
                        </div>
                    </div>

                    {{-- Institución (Estática o Area) --}}
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-background-light dark:bg-black/20 border border-gray-100 dark:border-gray-700/50">
                        <div class="p-2 bg-primary/10 text-primary rounded-lg">
                            <span class="material-symbols-outlined">account_balance</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Institución</p>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white">Centro CIDECH</h3>
                        </div>
                    </div>
                </div>

                @if($beca->url_oficial)
                    <a href="{{ $beca->url_oficial }}" target="_blank" rel="noopener noreferrer" 
                       class="mt-6 w-full flex items-center justify-center gap-2 rounded-lg h-12 px-6 bg-primary text-white text-base font-bold hover:bg-red-700 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        <span class="truncate">Postular ahora</span>
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                @else
                    <button disabled class="mt-6 w-full rounded-lg h-12 px-6 bg-gray-300 text-gray-500 font-bold cursor-not-allowed">
                        Convocatoria Cerrada
                    </button>
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Contacto</h2>
                <p class="mt-3 text-sm text-gray-600 dark:text-gray-300">Si tienes dudas sobre esta beca, puedes contactar directamente:</p>
                <div class="mt-4 space-y-3">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-gray-400">mail</span>
                        <a class="text-sm text-primary font-medium hover:underline" href="mailto:becas@cidech.edu">becas@cidech.edu</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-gray-400">call</span>
                        <span class="text-sm text-gray-700 dark:text-gray-200">+52 55 1234 5678</span>
                    </div>
                </div>
            </div>

        </aside>
    </div>
@endsection