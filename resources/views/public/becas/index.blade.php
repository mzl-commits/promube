@extends('layouts.public')

@section('title', 'Catálogo de Becas - PROMUBE')

@section('content')
    <style>
        /* --- ESTILOS ESPECÍFICOS PARA EL CATÁLOGO --- */
        
        /* Mini Hero con patrón sutil */
        .page-header {
            position: relative;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border-radius: 1.5rem;
            overflow: hidden;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.3);
            margin-bottom: 4rem;
        }
        
        /* Patrón de fondo decorativo */
        .page-header::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.1;
            background-image: radial-gradient(#ffffff 1px, transparent 1px);
            background-size: 30px 30px;
        }

        /* Tarjeta de Beca */
        .beca-card {
            background: white;
            border-radius: 1.25rem;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }
        .dark .beca-card {
            background: #1f2937;
            border-color: rgba(255,255,255,0.05);
        }

        .beca-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.15);
            border-color: rgba(217, 54, 62, 0.3); /* Primary color border on hover */
        }

        .beca-image-wrapper {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .beca-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .beca-card:hover .beca-image {
            transform: scale(1.08);
        }

        .beca-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 60%);
            opacity: 0.6;
        }

        .badge-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            color: #1f2937;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35rem 0.85rem;
            border-radius: 9999px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4px);
            z-index: 10;
        }
        
        .dark .badge-category {
            background: rgba(31, 41, 55, 0.9);
            color: white;
        }

        .btn-card {
            margin-top: auto; /* Empuja el botón al final */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.875rem;
            border-radius: 0.75rem;
            background-color: #f3f4f6;
            color: #1f2937;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .dark .btn-card {
            background-color: #374151;
            color: #e5e7eb;
        }

        .beca-card:hover .btn-card {
            background-color: #D9363E; /* Primary */
            color: white;
        }
    </style>

    {{-- HEADER DE LA PÁGINA --}}
    <section class="container mx-auto px-4 sm:px-6 mt-6">
        <div class="page-header">
            <div class="relative z-10">
                <span class="text-primary font-bold tracking-widest uppercase text-xs mb-3 block">Oportunidades Educativas</span>
                <h1 class="text-3xl md:text-5xl font-black text-white mb-4">
                    Catálogo de Becas
                </h1>
                <p class="text-gray-300 max-w-2xl mx-auto text-lg font-light">
                    Explora nuestra lista completa de apoyos y programas diseñados para impulsar tu crecimiento académico y profesional.
                </p>
            </div>
        </div>
    </section>

    {{-- GRID DE BECAS --}}
    <section class="container mx-auto px-4 sm:px-6 pb-24">
        
        {{-- Array de imágenes de respaldo para el bucle (Igual que en Home para consistencia) --}}
        @php
            $imagenes = [
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE', // Edificio
                'https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY', // Laboratorio
                'https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw', // Arte
                'https://lh3.googleusercontent.com/aida-public/AB6AXuAqsDW7Eyzl38NxtWzXWj9ZPNb9fnfDkRhiSR5ugftDifvRlgtJRrJgnObPxcDYoKv0hx6cghdStc9Rr8w-H_A5ixsXT1LSeMWXrD727ymKaPh_kk7h-Ul2txlr3zTIgf806_eYucfUe1WRUPIxzgoca2dwJHdAgu9x0gwM-QgJtuydonoDwuv31yLaQ5D5fpDyKZdATqfnn6BK_1dOlv3YKPsKjv_pCf62uLtgJibEcgS32AoV8eOVKyXEaq1D6g3znWc1vivIYjw', // Laptops
                'https://lh3.googleusercontent.com/aida-public/AB6AXuB6zVY2V16CGVuc4WNtxW-GpEd3MpEU1wyTOHuWQqEgHLzwbqf05yKK3k2nBdug7uncLU64WSj5tlCmtB_4zAa0TiOYhNJWNkamFFRtRtOPugWEwkMV5iWP9FcOPeoA1je-V16kb-LWsntI2zf-P0JW3iViyI23Qj_9_uLkihF-bJ6LRzwkg-ocWfZzwb0uaCBhESle3HTNAlj4yMaN_PVDw0V8m09VsLeocoJyw-DJqyy8w0FgdKOda0MhoY0rOYbNfRIB3iojjyE', // Deporte
                'https://lh3.googleusercontent.com/aida-public/AB6AXuBg8PymSKI3WqL0j_KJBDo7DgRCwApkez7oMNJ-4DXE0870OQlrDSnJ-oTFCXGT0cnbmhkHAvtgHlfVMfssGaBLKqpobcgKNNh2Z0IwiYk1J9D29_csvV7aoFllZJgqD3ipRx806mX4LLAbRP_YeMqYp03QIlHvUHfh5thXRHFcUb8VfuqVurY6dlSoOnolpLWFcgBCFLvniImMuDxAGPw4-g4W3bgYF4T3GYlhKK3tyw9LHGi5sIYKOKViLgZbIJzYKCY-3hbzraQ' // Extra (Biblioteca)
            ];
        @endphp

        @if($becas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($becas as $index => $beca)
                    {{-- Selección de imagen cíclica --}}
                    @php $imgSrc = $imagenes[$index % count($imagenes)]; @endphp

                    <article class="beca-card group">
                        {{-- Imagen + Badge --}}
                        <div class="beca-image-wrapper">
                            <span class="badge-category">{{ $beca->tipo ?? 'General' }}</span>
                            <img src="{{ $imgSrc }}" alt="{{ $beca->titulo }}" class="beca-image">
                            <div class="beca-overlay"></div>
                            
                            {{-- Info flotante sobre imagen (opcional, como el nivel) --}}
                            <div class="absolute bottom-4 left-4 z-10">
                                <span class="text-white text-xs font-medium bg-black/30 backdrop-blur-sm px-2 py-1 rounded border border-white/20">
                                    {{ $beca->nivel ?? 'Nivel Varios' }}
                                </span>
                            </div>
                        </div>

                        {{-- Contenido Textual --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="mb-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 leading-tight group-hover:text-primary transition-colors">
                                    {{ $beca->titulo }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium flex items-center gap-1">
                                    <span class="material-symbols-outlined text-base">location_on</span>
                                    {{ $beca->modalidad ?? 'Presencial' }} • {{ $beca->pais ?? 'México' }}
                                </p>
                            </div>

                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ $beca->resumen ?? Str::limit($beca->descripcion, 120) }}
                            </p>

                            {{-- Botón de Acción --}}
                            <a href="{{ route('becas.show', $beca->id) }}" class="btn-card group-hover:shadow-lg">
                                Ver convocatoria
                                <span class="material-symbols-outlined ml-2 text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Paginación (Si la implementaras en el controlador) --}}
            {{-- <div class="mt-12">
                {{ $becas->links() }}
            </div> --}}

        @else
            {{-- Estado Vacío --}}
            <div class="text-center py-20 bg-gray-50 dark:bg-gray-800/50 rounded-2xl border border-dashed border-gray-300 dark:border-gray-700">
                <div class="bg-gray-100 dark:bg-gray-700 rounded-full p-4 w-20 h-20 mx-auto mb-6 flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-gray-400">search_off</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No hay becas disponibles</h3>
                <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">
                    Actualmente no tenemos convocatorias abiertas. Por favor, revisa más tarde o suscríbete a nuestro boletín.
                </p>
                <a href="{{ route('home') }}" class="mt-6 inline-flex items-center font-bold text-primary hover:underline">
                    <span class="material-symbols-outlined mr-1">arrow_back</span>
                    Volver al inicio
                </a>
            </div>
        @endif
    </section>
@endsection