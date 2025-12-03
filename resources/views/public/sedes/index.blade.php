@extends('layouts.public')

@section('title', 'Sedes - PROMUBE')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Sedes y puntos de atención</h1>
    <p class="text-gray-700 mb-4 text-sm">
        PROMUBE trabaja con distintas sedes y puntos de atención en diversas regiones.
        Aquí puedes encontrar información de contacto y ubicación.
    </p>

    <div class="space-y-4">
        @forelse($sedes as $sede)
            <div class="bg-white rounded-lg shadow-sm p-4 flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <h2 class="font-semibold text-lg">{{ $sede->nombre }}</h2>
                    <p class="text-sm text-gray-700">
                        {{ $sede->direccion }}
                        @if($sede->ciudad || $sede->departamento)
                            <br>
                            {{ $sede->ciudad }} @if($sede->departamento) – {{ $sede->departamento }} @endif
                        @endif
                    </p>

                    @if($sede->horario)
                        <p class="text-sm text-gray-600 mt-2">
                            <span class="font-semibold">Horario:</span> {{ $sede->horario }}
                        </p>
                    @endif

                    @if($sede->telefono)
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold">Teléfono:</span> {{ $sede->telefono }}
                        </p>
                    @endif

                    @if($sede->correo_contacto)
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold">Correo:</span> {{ $sede->correo_contacto }}
                        </p>
                    @endif
                </div>

                @if($sede->google_maps_url)
                    <div class="w-full md:w-72 h-48">
                        <iframe
                            src="{{ $sede->google_maps_url }}"
                            class="w-full h-full rounded border"
                            style="border:0;"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @endif
            </div>
        @empty
            <p class="text-gray-500 text-sm">
                Aún no se han registrado sedes.
            </p>
        @endforelse
    </div>
@endsection
