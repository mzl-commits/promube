@extends('layouts.public')

@section('title', 'Noticias y anuncios - PROMUBE')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Noticias y anuncios</h1>
    <p class="text-gray-700 mb-4 text-sm">
        Mantente al tanto de las últimas convocatorias, eventos y novedades relacionadas
        con las becas y programas difundidos por PROMUBE.
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($noticias as $n)
            <article class="bg-white rounded-lg shadow-sm p-4 text-sm flex flex-col">
                @if($n->imagen_url)
                    <img src="{{ $n->imagen_url }}" alt="{{ $n->titulo }}"
                         class="w-full h-36 object-cover rounded mb-3">
                @endif

                <h2 class="font-semibold mb-1">{{ $n->titulo }}</h2>

                @if($n->publicado_en)
                    <p class="text-xs text-gray-500 mb-2">
                        Publicado el {{ $n->publicado_en->format('d/m/Y') }}
                    </p>
                @endif

                @if($n->resumen)
                    <p class="text-gray-700 mb-2">
                        {{ \Illuminate\Support\Str::limit($n->resumen, 140) }}
                    </p>
                @else
                    <p class="text-gray-700 mb-2">
                        {{ \Illuminate\Support\Str::limit(strip_tags($n->contenido), 140) }}
                    </p>
                @endif
            </article>
        @empty
            <p class="text-gray-500 text-sm">
                Por el momento no hay noticias publicadas.
            </p>
        @endforelse
    </div>
@endsection
