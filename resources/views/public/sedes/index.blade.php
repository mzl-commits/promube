@extends('layouts.public')

@section('title', 'Sedes y cobertura - PROMUBE')

@section('content')
    <div class="px-4 sm:px-10 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col max-w-[960px] flex-1">

            {{-- Título + descripción --}}
            <div class="flex flex-wrap justify-between gap-3 p-4">
                <div class="flex min-w-72 flex-col gap-3">
                    <p class="text-primary text-4xl font-black leading-tight tracking-[-0.033em]">
                        Sedes y cobertura
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal">
                        PROMUBE – CIDECH opera en diferentes regiones del país para estar más cerca de ti.
                        Encuentra la sede más cercana y conoce cómo podemos ayudarte a alcanzar tus metas educativas.
                    </p>
                </div>
            </div>

            {{-- Tarjetas de sedes --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                @forelse($sedes as $sede)
                    <article
                        class="flex flex-col gap-3 pb-3 bg-white dark:bg-gray-800/50 p-4 rounded-xl
                               border border-gray-200 dark:border-gray-700">
                        <span class="material-symbols-outlined text-primary text-2xl">
                            location_on
                        </span>

                        <div>
                            {{-- Nombre de sede --}}
                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal">
                                {{ $sede->nombre }}
                            </p>

                            {{-- Dirección --}}
                            @if($sede->direccion)
                                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ $sede->direccion }}
                                </p>
                            @endif

                            {{-- Horario --}}
                            @if($sede->horario)
                                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ $sede->horario }}
                                </p>
                            @endif

                            {{-- Correo --}}
                            @if($sede->correo)
                                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ $sede->correo }}
                                </p>
                            @endif

                            {{-- Teléfono --}}
                            @if($sede->telefono)
                                <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ $sede->telefono }}
                                </p>
                            @endif
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 text-sm col-span-full text-center">
                        Aún no se han registrado sedes o regiones de cobertura.
                    </p>
                @endforelse
            </div>

            {{-- Mapa de referencia --}}
            <h2 class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                Mapa de referencia
            </h2>

            {{-- Leyenda (chips) usando las mismas sedes --}}
            <div class="flex gap-3 p-3 flex-wrap pr-4">
                @foreach($sedes->take(6) as $sede)
                    <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-primary/20 px-3">
                        <span class="material-symbols-outlined text-primary" style="font-size: 16px;">
                            circle
                        </span>
                        <p class="text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal">
                            {{ $sede->nombre }}
                        </p>
                    </div>
                @endforeach
            </div>

            {{-- Contenedor de mapa (placeholder o imagen configurable) --}}
            <div class="flex px-4 py-3">
                @php
                    // Puedes guardar la URL del mapa en config('promube.mapa_url') o en una variable $mapaUrl
                    $mapaUrl = $mapaUrl ?? config('promube.mapa_url')
                        ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAt08Rqh3pHMqJnJz05aXRLQIPqry1dr3Jzvsz-Hj30PBY0EJiJz9yGDaBHAMsjhICCeHBfsuOT2QU8pwwPmTMK56BZJ9vL2PJgGs4vLFDim8q9YD1GmBTz13GGG-euNSyHgQGhYfPAlkGOds3KYgUu71a9-9Qd3SV5rSi4zRA-KLl-kh7LoZ6EJT4pchA30wykOdKwpVu3NzKD3mHo72V_eO23uW1CcS99CXs79K-IZrJ53b3MJnhkklhWTsDcO_vA5bdoXoNI528';
                @endphp

                <div
                    class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl object-cover
                           bg-gray-200 dark:bg-gray-700"
                    style="background-image: url('{{ $mapaUrl }}');">
                </div>
            </div>

            {{-- Bloque de contacto rápido --}}
            <div class="p-4 mt-8">
                <div
                    class="flex flex-col sm:flex-row items-center justify-between gap-6 bg-white
                           dark:bg-gray-800/50 p-8 rounded-xl border border-gray-200 dark:border-gray-700">

                    <div class="text-center sm:text-left">
                        <h3 class="text-gray-900 dark:text-white text-xl font-bold">
                            ¿Tienes dudas sobre qué sede te corresponde?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            Nuestro equipo está listo para ayudarte a encontrar la mejor opción para ti.
                        </p>
                    </div>

                    @php
                        $whatsappUrl = $whatsappUrl
                            ?? config('promube.whatsapp_url')
                            ?? '#';
                    @endphp

                    <a href="{{ $whatsappUrl }}"
                       target="{{ $whatsappUrl !== '#' ? '_blank' : '_self' }}"
                       class="flex h-12 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-primary
                              px-6 text-white font-semibold transition-colors hover:bg-primary/90">
                        <span class="material-symbols-outlined">sms</span>
                        <span>Escríbenos por WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
