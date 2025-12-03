@extends('layouts.public')

@section('title', 'Inicio - PROMUBE')

@section('content')
    {{-- Hero --}}
    <section class="w-full py-16 md:py-24 bg-white dark:bg-background-dark">
        <div class="max-w-5xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="flex flex-col gap-6 text-left">
                    <h1 class="text-[#171111] dark:text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">
                        <span class="text-primary">PROMUBE</span> – Promoción de Becas y Programas Educativos
                    </h1>
                    <p class="text-gray-600 dark:text-gray-300 text-base md:text-lg font-normal leading-normal">
                        Conectamos a estudiantes talentosos con las mejores oportunidades educativas y becas para impulsar
                        su futuro académico y profesional. Descubre el programa perfecto para ti.
                    </p>
                    <div class="mt-2">
                        <a href="{{ route('becas.index') }}"
                           class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                            <span class="truncate">Ver becas disponibles</span>
                        </a>
                    </div>
                </div>

                {{-- Imagen hero (estática por ahora) --}}
                <div class="w-full bg-center bg-no-repeat aspect-video md:aspect-square bg-cover rounded-xl"
                     style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDMkiIe1lauJfZ8VTvdepFEvMb3p86raJSK99VCz9gx0EC9sN75VeG507AvU19TkFobWA6MbOHrLaA_FTNKstUcz5Q8NZ-INmk__wcjXLrvEV8ta1FMRz8hnYuZXafvqcekG8Mx7magwH6CUoNm6M5j3MVKZK3JKEJQaQKQ99OgEcYgYJPxFwbbqc_qcWYrXNhQ1HpxKASoGcfxPb3Yen0funJZNyyS40xEZTjIsFFygakMPMwor_6WJvagdj32zAY6SomzUTue6AM");'>
                </div>
            </div>
        </div>
    </section>

    {{-- Becas destacadas --}}
    <section class="w-full py-16 md:py-24">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-[#171111] dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em] mb-8 text-center">
                Descubre Nuestras Becas Destacadas
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($becasDestacadas as $beca)
                    <div
                        class="flex h-full flex-col gap-4 rounded-xl bg-white dark:bg-gray-800/50 shadow-sm border border-transparent hover:border-primary/30 transition-all overflow-hidden">
                        {{-- Si algún día agregamos imagen en la tabla becas, usamos $beca->imagen_url --}}
                        <div class="w-full bg-center bg-no-repeat aspect-video bg-cover"
                             style='background-image: url("{{ $beca->imagen_url ?? 'https://via.placeholder.com/640x360?text=Beca' }}");'>
                        </div>

                        <div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
                            <div class="pt-4">
                                <p class="text-[#171111] dark:text-white text-lg font-bold leading-normal">
                                    {{ $beca->titulo }}
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mt-1">
                                    Tipo: {{ $beca->tipo ?? '—' }}
                                    @if($beca->nivel) | Nivel: {{ $beca->nivel }} @endif
                                    @if($beca->modalidad) | Modalidad: {{ $beca->modalidad }} @endif
                                </p>
                            </div>
                            <a href="{{ $beca->url_oficial ?? route('becas.index') }}"
                               target="{{ $beca->url_oficial ? '_blank' : '_self' }}"
                               class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/10 text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/20 transition-colors">
                                <span class="truncate">Saber más</span>
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Tarjetas de ejemplo cuando aún no hay becas destacadas --}}
                    <p class="text-gray-500 text-sm col-span-full text-center">
                        Aún no se han registrado becas destacadas.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Alumnos beneficiados --}}
    <section class="w-full py-16 md:py-24 bg-white dark:bg-background-dark">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-[#171111] dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em] mb-8 text-center">
                Historias de Éxito de Nuestros Alumnos
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($beneficiados as $b)
                    <div
                        class="flex flex-col items-center text-center p-6 rounded-xl bg-background-light dark:bg-gray-800/50">
                        @if($b->foto_url)
                            <img src="{{ $b->foto_url }}" alt="{{ $b->nombre_completo }}"
                                 class="size-24 rounded-full object-cover mb-4 border-4 border-primary/20">
                        @else
                            <div
                                class="size-24 rounded-full mb-4 border-4 border-primary/20 bg-primary/20 flex items-center justify-center text-primary font-bold">
                                {{ Str::substr($b->nombre_completo, 0, 1) }}
                            </div>
                        @endif

                        <h3 class="text-[#171111] dark:text-white font-bold text-lg">
                            {{ $b->nombre_completo }}
                        </h3>

                        <p class="text-primary text-sm font-medium">
                            {{ $b->programa }}
                            @if($b->anio)
                                , {{ $b->anio }}
                            @endif
                        </p>

                        @if($b->region)
                            <p class="text-gray-500 dark:text-gray-400 text-xs mt-1">
                                {{ $b->region }}
                            </p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-sm col-span-full text-center">
                        Aún no se han registrado alumnos beneficiados.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Noticias y anuncios --}}
    <section class="w-full py-16 md:py-24">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-[#171111] dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em] mb-8 text-center">
                Mantente Informado
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($noticias as $n)
                    <article
                        class="flex flex-col gap-4 p-6 rounded-xl bg-white dark:bg-gray-800/50 shadow-sm border-t-4 border-primary/50">
                        <p class="text-gray-500 dark:text-gray-400 text-sm">
                            {{ optional($n->publicado_en)->format('d/m/Y') }}
                        </p>
                        <h3 class="text-[#171111] dark:text-white font-bold text-lg">
                            {{ $n->titulo }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            {{ \Illuminate\Support\Str::limit($n->resumen ?? strip_tags($n->contenido), 140) }}
                        </p>
                    </article>
                @empty
                    <p class="text-gray-500 text-sm col-span-full text-center">
                        Aún no hay noticias publicadas.
                    </p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
