@extends('layouts.public')

@section('title', 'Noticias y anuncios - PROMUBE')

@section('content')
    <div class="px-4 sm:px-8 md:px-16 lg:px-24 xl:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">

            {{-- Encabezado --}}
            <div class="flex flex-wrap justify-between gap-3 p-4">
                <div class="flex min-w-72 flex-col gap-3">
                    <p class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                        Noticias y anuncios
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal">
                        En esta sección se publican las convocatorias a becas, talleres, alianzas y otras noticias de
                        interés para la comunidad de CIDECH y PROMUBE.
                    </p>
                </div>
            </div>

            {{-- Filtros (tipo, año, búsqueda) --}}
            <form method="GET"
                  class="flex flex-col md:flex-row items-center justify-between gap-4 px-4 py-3 border-y border-gray-200 dark:border-gray-700 my-4">
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    {{-- Tipo --}}
                    <div class="flex items-center gap-2">
                        <label for="type-select"
                               class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tipo:
                        </label>
                        <select
                            id="type-select"
                            name="tipo"
                            class="block w-full sm:w-auto rounded border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-gray-800 text-gray-900 dark:text-white shadow-sm
                                   focus:border-primary focus:ring-primary focus:ring-opacity-50 text-sm">
                            <option value="">Todos</option>
                            @foreach(($tiposDisponibles ?? []) as $tipo)
                                <option value="{{ $tipo }}" @selected(request('tipo') === $tipo)>
                                    {{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Año --}}
                    <div class="flex items-center gap-2">
                        <label for="year-select"
                               class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Año:
                        </label>
                        <select
                            id="year-select"
                            name="anio"
                            class="block w-full sm:w-auto rounded border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-gray-800 text-gray-900 dark:text-white shadow-sm
                                   focus:border-primary focus:ring-primary focus:ring-opacity-50 text-sm">
                            <option value="">Todos</option>
                            @foreach(($aniosDisponibles ?? []) as $anio)
                                <option value="{{ $anio }}" @selected(request('anio') == $anio)>
                                    {{ $anio }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Buscador --}}
                <div class="relative w-full md:w-64">
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Buscar por palabra clave..."
                        class="w-full pl-10 pr-4 py-2 rounded border border-gray-300 dark:border-gray-600
                               bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:border-primary
                               focus:ring-primary focus:ring-opacity-50 text-sm">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500 text-lg">
                        search
                    </span>
                </div>
            </form>

            <div class="flex flex-col lg:flex-row gap-8 p-4">
                {{-- Listado principal --}}
                <main class="w-full lg:w-2/3">
                    @php use Illuminate\Support\Str; @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @forelse($noticias as $noticia)
                            @php
                                $fecha = $noticia->publicado_en ?? $noticia->created_at;
                                $fechaFmt = $fecha ? $fecha->translatedFormat('d \\de F, Y') : null;

                                // Badge de tipo → color
                                $tipo = $noticia->tipo ?? 'Noticia';
                                $tipoColor = match(Str::lower($tipo)) {
                                    'convocatoria' => 'bg-primary',
                                    'taller'       => 'bg-blue-500',
                                    'noticia'      => 'bg-green-500',
                                    'evento'       => 'bg-purple-500',
                                    default        => 'bg-primary',
                                };

                                $imagen = $noticia->imagen_url
                                    ?? 'https://via.placeholder.com/800x450?text=Noticia';
                                $resumen = $noticia->resumen
                                    ?? Str::limit(strip_tags($noticia->contenido ?? ''), 180);
                                $urlShow = Route::has('noticias.show')
                                    ? route('noticias.show', $noticia)
                                    : '#';
                            @endphp

                            <article
                                class="flex flex-col gap-3 pb-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm
                                       overflow-hidden transition-shadow hover:shadow-lg">

                                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover"
                                     style='background-image: url("{{ $imagen }}");'>
                                </div>

                                <div class="p-4 flex flex-col flex-grow">
                                    <div class="flex justify-between items-center mb-2">
                                        <p class="text-gray-500 dark:text-gray-400 text-xs font-normal leading-normal">
                                            @if($fechaFmt)
                                                Publicado el {{ $fechaFmt }}
                                            @endif
                                        </p>
                                        <span class="text-xs font-semibold text-white rounded-full px-2 py-0.5 {{ $tipoColor }}">
                                            {{ $tipo }}
                                        </span>
                                    </div>

                                    <p class="text-gray-900 dark:text-white text-lg font-bold leading-normal mb-2">
                                        {{ $noticia->titulo }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300 text-sm font-normal leading-normal mb-4 flex-grow">
                                        {{ $resumen }}
                                    </p>

                                    <a href="{{ $urlShow }}"
                                       class="text-primary dark:text-primary font-bold text-sm hover:underline self-start">
                                        Leer más
                                        <span class="material-symbols-outlined text-sm align-middle">
                                            arrow_forward
                                        </span>
                                    </a>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-500 dark:text-gray-400 text-sm col-span-full text-center">
                                Aún no se han publicado noticias ni anuncios.
                            </p>
                        @endforelse
                    </div>

                    {{-- Paginación real (si viene paginado) --}}
                    @if($noticias instanceof \Illuminate\Contracts\Pagination\Paginator)
                        <div class="mt-8">
                            {{ $noticias->links() }}
                        </div>
                    @endif
                </main>

                {{-- Sidebar: próximos eventos --}}
                <aside class="w-full lg:w-1/3">
                    <div class="sticky top-5 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                        <h2 class="text-gray-900 dark:text-white text-xl font-bold leading-tight tracking-[-0.015em] mb-4">
                            Próximos eventos
                        </h2>

                        <div class="space-y-4">
                            @forelse($eventosProximos ?? [] as $evento)
                                @php
                                    $f = $evento->fecha ?? null;
                                    $mes = $f ? Str::upper($f->translatedFormat('M')) : '';
                                    $dia = $f ? $f->format('d') : '';
                                @endphp
                                <div class="flex items-start gap-4">
                                    <div
                                        class="flex flex-col items-center justify-center bg-primary/10 dark:bg-primary/20
                                               text-primary dark:text-red-300 rounded-lg p-2 w-16 h-16 shrink-0">
                                        <span class="text-sm font-bold">{{ $mes }}</span>
                                        <span class="text-2xl font-black">{{ $dia }}</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800 dark:text-gray-100">
                                            {{ $evento->titulo }}
                                        </p>
                                        @if($evento->lugar)
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ $evento->lugar }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    No hay eventos próximos registrados por el momento.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>

            {{-- Si quieres mantener una paginación "bonita" aparte, puedes dejar solo la de Laravel --}}
            {{-- ya pusimos {{ $noticias->links() }} arriba --}}
        </div>
    </div>
@endsection
