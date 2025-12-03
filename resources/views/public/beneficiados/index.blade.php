@extends('layouts.public')

@section('title', 'Alumnos beneficiados - PROMUBE')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Alumnos beneficiados</h1>
    <p class="text-gray-700 mb-4 text-sm">
        Aquí se muestran algunos de los estudiantes que han sido beneficiados con becas y programas
        promovidos por PROMUBE.
    </p>

    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($beneficiados as $b)
            <div class="bg-white rounded-lg shadow-sm p-3 text-sm">
                @if($b->foto_url)
                    <img src="{{ $b->foto_url }}" alt="{{ $b->nombre_completo }}"
                         class="w-full h-40 object-cover rounded mb-3">
                @endif

                <div class="font-semibold">{{ $b->nombre_completo }}</div>

                @if($b->programa)
                    <div class="text-xs text-gray-700">
                        Programa: {{ $b->programa }}
                        @if($b->anio) – {{ $b->anio }} @endif
                    </div>
                @endif

                @if($b->region)
                    <div class="text-xs text-gray-500 mt-1">
                        Región: {{ $b->region }}
                    </div>
                @endif

                @if($b->biografia)
                    <p class="text-xs text-gray-600 mt-2">
                        {{ \Illuminate\Support\Str::limit($b->biografia, 120) }}
                    </p>
                @endif
            </div>
        @empty
            <p class="text-gray-500 text-sm">
                Aún no se han registrado alumnos beneficiados.
            </p>
        @endforelse
    </div>
@endsection
