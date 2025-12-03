@extends('layouts.public')

@section('title', 'Alumnos beneficiados - PROMUBE')

@section('content')
    <div class="px-4 sm:px-8 md:px-16 lg:px-24 xl:px-40 flex flex-1 justify-center py-10">
        <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            {{-- Título principal --}}
            <div class="flex flex-wrap justify-between gap-3 p-4">
                <div class="flex w-full flex-col gap-3">
                    <p class="text-primary text-4xl font-black leading-tight tracking-[-0.033em]">
                        Alumnos beneficiados
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal max-w-3xl">
                        Descubre el impacto de las becas y programas de PROMUBE-CIDECH en diversas regiones,
                        transformando el futuro de estudiantes talentosos.
                    </p>
                </div>
            </div>

            {{-- Filtros básicos (interfaz, opcionalmente conectados por GET) --}}
            <form method="GET" class="flex gap-3 p-4 flex-wrap">
                {{-- Año --}}
                <div class="relative">
                    <select
                        name="anio"
                        class="appearance-none flex h-9 items-center justify-center gap-x-2 rounded-lg
                               bg-gray-200 dark:bg-background-dark dark:border dark:border-gray-700
                               pl-4 pr-9 text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal
                               hover:bg-gray-300 dark:hover:bg-gray-800 transition-colors focus:outline-none
                               focus:ring-2 focus:ring-primary/50">
                        <option value="">Año</option>
                        @foreach(($aniosDisponibles ?? []) as $anio)
                            <option value="{{ $anio }}" @selected(request('anio') == $anio)>{{ $anio }}</option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined text-gray-800 dark:text-gray-200 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none">
                        expand_more
                    </span>
                </div>

                {{-- Región --}}
                <div class="relative">
                    <select
                        name="region"
                        class="appearance-none flex h-9 items-center justify-center gap-x-2 rounded-lg
                               bg-gray-200 dark:bg-background-dark dark:border dark:border-gray-700
                               pl-4 pr-9 text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal
                               hover:bg-gray-300 dark:hover:bg-gray-800 transition-colors focus:outline-none
                               focus:ring-2 focus:ring-primary/50">
                        <option value="">Región</option>
                        @foreach(($regionesDisponibles ?? []) as $region)
                            <option value="{{ $region }}" @selected(request('region') == $region)>
                                {{ $region }}
                            </option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined text-gray-800 dark:text-gray-200 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none">
                        expand_more
                    </span>
                </div>
            </form>

            {{-- Cifras resumen --}}
            @php
                $totalBeneficiados = $beneficiados->count();
                $totalRegiones     = $beneficiados->whereNotNull('region')->unique('region')->count();
                $totalProgramas    = $beneficiados->whereNotNull('programa')->unique('programa')->count();
            @endphp

            <h2 class="text-gray-900 dark:text-gray-100 text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-8">
                Cifras resumen
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                <div class="flex flex-1 flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
                    <p class="text-gray-600 dark:text-gray-300 text-base font-medium leading-normal">
                        Alumnos beneficiados
                    </p>
                    <p class="text-primary tracking-light text-3xl font-bold leading-tight">
                        {{ $totalBeneficiados }}
                    </p>
                </div>

                <div class="flex flex-1 flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
                    <p class="text-gray-600 dark:text-gray-300 text-base font-medium leading-normal">
                        Regiones impactadas
                    </p>
                    <p class="text-primary tracking-light text-3xl font-bold leading-tight">
                        {{ $totalRegiones }}
                    </p>
                </div>

                <div class="flex flex-1 flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
                    <p class="text-gray-600 dark:text-gray-300 text-base font-medium leading-normal">
                        Programas activos
                    </p>
                    <p class="text-primary tracking-light text-3xl font-bold leading-tight">
                        {{ $totalProgramas }}
                    </p>
                </div>
            </div>

            {{-- Nuestros alumnos --}}
            <h2 class="text-gray-900 dark:text-gray-100 text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-8">
                Nuestros alumnos
            </h2>

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4 p-4">
                @forelse($beneficiados as $b)
                    <article
                        class="flex flex-col gap-4 text-center pb-4 bg-white dark:bg-gray-900 rounded-xl
                               border border-gray-200 dark:border-gray-800 overflow-hidden group">

                        <div class="px-6 pt-6">
                            @if($b->foto_url)
                                <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-full"
                                     style='background-image: url("{{ $b->foto_url }}");'>
                                </div>
                            @else
                                <div
                                    class="w-full aspect-square rounded-full bg-primary/20 flex items-center justify-center
                                           text-primary text-3xl font-bold">
                                    {{ mb_substr($b->nombre_completo, 0, 1) }}
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-col gap-1 px-4">
                            <p class="text-gray-900 dark:text-white text-base font-bold leading-normal">
                                {{ $b->nombre_completo }}
                            </p>

                            {{-- Programa + año --}}
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
                                @if($b->programa)
                                    {{ $b->programa }}
                                @endif
                                @if($b->anio)
                                    {{ $b->programa ? ' ' : '' }}{{ $b->anio }}
                                @endif
                            </p>

                            {{-- Región --}}
                            @if($b->region)
                                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
                                    Región: {{ $b->region }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 pb-4 mt-2">
                            @php
                                $urlHistoria = $b->historia_url ?? null;
                            @endphp

                            @if($urlHistoria)
                                <a href="{{ $urlHistoria }}" target="_blank" rel="noopener"
                                   class="w-full inline-flex items-center justify-center text-sm font-semibold
                                          text-primary bg-primary/10 dark:bg-primary/20 h-9 rounded-lg
                                          hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors">
                                    Ver historia
                                </a>
                            @else
                                <button type="button"
                                        class="w-full text-sm font-semibold text-primary bg-primary/10 dark:bg-primary/20
                                               h-9 rounded-lg cursor-default opacity-60">
                                    Próximamente
                                </button>
                            @endif
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 text-sm col-span-full text-center">
                        Aún no se han registrado alumnos beneficiados.
                    </p>
                @endforelse
            </div>

            {{-- Paginación si viene paginado --}}
            @if($beneficiados instanceof \Illuminate\Contracts\Pagination\Paginator)
                <div class="mt-6">
                    {{ $beneficiados->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
