@extends('layouts.public')

@section('title', 'Becas disponibles - PROMUBE')

@section('content')
    <div class="px-4 sm:px-10 lg:px-20 xl:px-40 py-5">
        <div class="layout-content-container flex flex-col max-w-[1200px] mx-auto">

            {{-- Cabecera de página --}}
            <div class="flex flex-wrap justify-between gap-3 mb-4">
                <div class="flex min-w-72 flex-col gap-3">
                    <h1 class="text-[#171111] dark:text-gray-100 text-4xl font-black leading-tight tracking-[-0.033em]">
                        Becas disponibles
                    </h1>
                    <p class="text-[#876464] dark:text-gray-400 text-base font-normal leading-normal">
                        Explora las oportunidades y utiliza los filtros para encontrar la beca perfecta
                        para tu nivel académico y necesidades.
                    </p>
                </div>
            </div>

            {{-- Filtros (solo interfaz por ahora, GET opcional) --}}
            <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
                <div class="md:col-span-2 flex flex-wrap gap-3 items-center">

                    {{-- Tipo de beca --}}
                    <div class="relative w-full sm:w-auto">
                        <select
                            name="tipo"
                            class="appearance-none h-10 w-full sm:w-auto cursor-pointer rounded-lg bg-white
                                   dark:bg-background-dark dark:text-gray-300 dark:border-gray-700 border
                                   pl-4 pr-10 text-[#171111] text-sm font-medium leading-normal
                                   focus:outline-none focus:ring-2 focus:ring-primary/50">
                            <option value="">Tipo de beca</option>
                            <option value="Académica"  @selected(request('tipo') === 'Académica')>Académica</option>
                            <option value="Deportiva"  @selected(request('tipo') === 'Deportiva')>Deportiva</option>
                            <option value="Artística"  @selected(request('tipo') === 'Artística')>Artística</option>
                            <option value="Investigación" @selected(request('tipo') === 'Investigación')>Investigación</option>
                            <option value="Movilidad" @selected(request('tipo') === 'Movilidad')>Movilidad</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#171111] dark:text-gray-300">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                    </div>

                    {{-- Nivel --}}
                    <div class="relative w-full sm:w-auto">
                        <select
                            name="nivel"
                            class="appearance-none h-10 w-full sm:w-auto cursor-pointer rounded-lg bg-white
                                   dark:bg-background-dark dark:text-gray-300 dark:border-gray-700 border
                                   pl-4 pr-10 text-[#171111] text-sm font-medium leading-normal
                                   focus:outline-none focus:ring-2 focus:ring-primary/50">
                            <option value="">Nivel</option>
                            <option value="Pregrado"    @selected(request('nivel') === 'Pregrado')>Pregrado</option>
                            <option value="Licenciatura"@selected(request('nivel') === 'Licenciatura')>Licenciatura</option>
                            <option value="Posgrado"    @selected(request('nivel') === 'Posgrado')>Posgrado</option>
                            <option value="Maestría"    @selected(request('nivel') === 'Maestría')>Maestría</option>
                            <option value="Doctorado"   @selected(request('nivel') === 'Doctorado')>Doctorado</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#171111] dark:text-gray-300">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                    </div>

                    {{-- Modalidad --}}
                    <div class="relative w-full sm:w-auto">
                        <select
                            name="modalidad"
                            class="appearance-none h-10 w-full sm:w-auto cursor-pointer rounded-lg bg-white
                                   dark:bg-background-dark dark:text-gray-300 dark:border-gray-700 border
                                   pl-4 pr-10 text-[#171111] text-sm font-medium leading-normal
                                   focus:outline-none focus:ring-2 focus:ring-primary/50">
                            <option value="">Modalidad</option>
                            <option value="Presencial" @selected(request('modalidad') === 'Presencial')>Presencial</option>
                            <option value="Virtual"     @selected(request('modalidad') === 'Virtual')>Virtual</option>
                            <option value="Mixta"       @selected(request('modalidad') === 'Mixta')>Mixta</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#171111] dark:text-gray-300">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                    </div>
                </div>

                {{-- Buscador --}}
                <div class="md:col-span-1">
                    <label class="flex flex-col min-w-40 h-10 w-full">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                            <div class="text-[#876464] dark:text-gray-400 flex border-none bg-white
                                        dark:bg-background-dark dark:border-gray-700 border items-center
                                        justify-center pl-3 rounded-l-lg border-r-0">
                                <span class="material-symbols-outlined">search</span>
                            </div>
                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg
                                       text-[#171111] dark:text-gray-200 focus:outline-0 focus:ring-2
                                       focus:ring-primary/50 border-none bg-white dark:bg-background-dark
                                       dark:border-gray-700 border h-full placeholder:text-[#876464]
                                       dark:placeholder:text-gray-500 px-4 rounded-l-none border-l-0 pl-2
                                       text-sm font-normal leading-normal"
                                placeholder="Buscar por nombre de beca..."
                            />
                        </div>
                    </label>
                </div>
            </form>

            {{-- Grid de becas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php use Illuminate\Support\Str; @endphp

                @forelse($becas as $beca)
                    <article
                        class="flex flex-col gap-3 bg-white dark:bg-background-dark rounded-xl shadow-sm
                               hover:shadow-lg transition-shadow duration-300 overflow-hidden">

                        {{-- Imagen de la beca --}}
                        <div class="w-full h-40 bg-center bg-no-repeat bg-cover"
                             style='background-image: url("{{ $beca->imagen_url ?? 'https://via.placeholder.com/640x360?text=Beca' }}");'>
                        </div>

                        <div class="p-4 flex flex-col gap-3 flex-grow">
                            {{-- Chips tipo/nivel/modalidad --}}
                            <div class="flex flex-wrap gap-2">
                                @if($beca->tipo)
                                    <span
                                        class="text-xs font-medium bg-primary/20 text-primary
                                               dark:bg-primary/30 dark:text-primary/90 px-2 py-1 rounded-full">
                                        {{ $beca->tipo }}
                                    </span>
                                @endif

                                @if($beca->nivel)
                                    <span
                                        class="text-xs font-medium bg-gray-200 text-gray-700
                                               dark:bg-gray-700 dark:text-gray-200 px-2 py-1 rounded-full">
                                        {{ $beca->nivel }}
                                    </span>
                                @endif

                                @if($beca->modalidad)
                                    <span
                                        class="text-xs font-medium bg-gray-200 text-gray-700
                                               dark:bg-gray-700 dark:text-gray-200 px-2 py-1 rounded-full">
                                        {{ $beca->modalidad }}
                                    </span>
                                @endif
                            </div>

                            {{-- Título y descripción --}}
                            <h3 class="text-[#171111] dark:text-gray-100 text-base font-bold leading-normal">
                                {{ $beca->titulo }}
                            </h3>
                            <p class="text-[#876464] dark:text-gray-400 text-sm font-normal leading-normal flex-grow">
                                {{ Str::limit($beca->resumen ?? $beca->descripcion ?? '', 160) }}
                            </p>

                            {{-- Botón --}}
                            @php
                                $url = $beca->url_oficial ?? (Route::has('becas.show') ? route('becas.show', $beca) : '#');
                                $textoBoton = $beca->cta_texto ?? 'Ver detalles';
                            @endphp
                            <a href="{{ $url }}"
                               @if($beca->url_oficial) target="_blank" rel="noopener" @endif
                               class="mt-2 flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center
                                      justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white
                                      text-sm font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90">
                                <span class="truncate">{{ $textoBoton }}</span>
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500 text-sm col-span-full text-center">
                        Aún no se han registrado becas.
                    </p>
                @endforelse
            </div>

            {{-- Paginación (si viene paginada) --}}
            @if($becas instanceof \Illuminate\Contracts\Pagination\Paginator)
                <div class="mt-8">
                    {{ $becas->links() }}
                </div>
            @endif

            {{-- CTA final --}}
            <section class="mt-10">
                <div class="bg-white dark:bg-background-dark rounded-xl shadow-sm p-8
                            flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl font-bold text-[#171111] dark:text-gray-100">
                            ¿No encuentras la beca ideal?
                        </h2>
                        <p class="text-[#876464] dark:text-gray-400 mt-2">
                            Nuestro equipo está aquí para ayudarte. Contáctanos para recibir orientación personalizada.
                        </p>
                    </div>

                    @php
                        $rutaContacto = \Illuminate\Support\Facades\Route::has('contacto')
                            ? route('contacto')
                            : '#';
                    @endphp

                    <a href="{{ $rutaContacto }}"
                       class="flex shrink-0 min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center
                              overflow-hidden rounded-lg h-12 px-6 bg-primary text-white text-base font-bold
                              leading-normal tracking-[0.015em] hover:bg-opacity-90">
                        <span class="truncate">Contactar a un asesor</span>
                    </a>
                </div>
            </section>
        </div>
    </div>
@endsection
