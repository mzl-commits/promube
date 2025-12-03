@extends('layouts.public')

@section('title', 'Preguntas frecuentes - PROMUBE')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Preguntas frecuentes</h1>
    <p class="text-gray-700 mb-4 text-sm">
        Aquí encontrarás respuestas a las dudas más comunes sobre las becas y programas
        difundidos por PROMUBE.
    </p>

    <div class="space-y-3">
        @forelse($faqs as $faq)
            <div class="bg-white rounded-lg shadow-sm p-3">
                <h2 class="font-semibold text-sm mb-1">
                    {{ $faq->pregunta }}
                </h2>
                <p class="text-gray-700 text-sm">
                    {!! nl2br(e($faq->respuesta)) !!}
                </p>
            </div>
        @empty
            <p class="text-gray-500 text-sm">
                Aún no se han registrado preguntas frecuentes.
            </p>
        @endforelse
    </div>
@endsection
