@extends('layouts.public')

@section('title', 'Preguntas frecuentes y contacto - PROMUBE')

@section('content')
    <div class="flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full max-w-4xl px-4">

            {{-- Encabezado --}}
            <div class="flex flex-wrap justify-between gap-3 py-8 text-center md:text-left">
                <div class="flex w-full flex-col gap-3">
                    <h1 class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                        Preguntas frecuentes
                    </h1>
                    <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">
                        Te invitamos a leer nuestras preguntas más comunes antes de escribirnos.
                        Es posible que encuentres tu respuesta aquí.
                    </p>
                </div>
            </div>

            {{-- FAQs estáticas --}}
            <div class="flex flex-col py-4 gap-3">
                {{-- FAQ 1 --}}
                <details
                    class="flex flex-col rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 px-4 py-2 group"
                    open>
                    <summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
                        <p class="text-gray-900 dark:text-white text-base font-bold">
                            ¿Cuáles son los requisitos para aplicar a una beca?
                        </p>
                        <span
                            class="material-symbols-outlined text-gray-900 dark:text-white group-open:rotate-180 transition-transform duration-300">
                            expand_more
                        </span>
                    </summary>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal pb-2">
                        Los requisitos varían según el programa. Generalmente se solicita comprobante de estudios,
                        una carta de motivos y cumplir con el perfil académico especificado en la convocatoria.
                        Consulta la página de cada programa para ver los detalles completos.
                    </p>
                </details>

                {{-- FAQ 2 --}}
                <details
                    class="flex flex-col rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 px-4 py-2 group">
                    <summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
                        <p class="text-gray-900 dark:text-white text-base font-bold">
                            ¿Cómo puedo saber si mi solicitud fue aceptada?
                        </p>
                        <span
                            class="material-symbols-outlined text-gray-900 dark:text-white group-open:rotate-180 transition-transform duration-300">
                            expand_more
                        </span>
                    </summary>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal pb-2">
                        Los resultados se publican en nuestro sitio web en las fechas indicadas en la convocatoria.
                        Además, se notificará a las personas seleccionadas por correo electrónico. Revisa tu bandeja de
                        entrada y también la carpeta de spam.
                    </p>
                </details>

                {{-- FAQ 3 --}}
                <details
                    class="flex flex-col rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 px-4 py-2 group">
                    <summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
                        <p class="text-gray-900 dark:text-white text-base font-bold">
                            ¿Hay un límite de edad para participar en los programas?
                        </p>
                        <span
                            class="material-symbols-outlined text-gray-900 dark:text-white group-open:rotate-180 transition-transform duration-300">
                            expand_more
                        </span>
                    </summary>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal pb-2">
                        La mayoría de nuestros programas no tienen un límite de edad estricto, pero algunos sí pueden
                        incluir criterios específicos. Te recomendamos revisar los detalles de cada convocatoria para
                        confirmar los requisitos de elegibilidad.
                    </p>
                </details>

                {{-- FAQ 4 --}}
                <details
                    class="flex flex-col rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 px-4 py-2 group">
                    <summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
                        <p class="text-gray-900 dark:text-white text-base font-bold">
                            ¿Puedo aplicar a múltiples programas simultáneamente?
                        </p>
                        <span
                            class="material-symbols-outlined text-gray-900 dark:text-white group-open:rotate-180 transition-transform duration-300">
                            expand_more
                        </span>
                    </summary>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal pb-2">
                        Sí, puedes postular a varios programas al mismo tiempo, siempre que cumplas con los requisitos
                        de cada uno. Sin embargo, solo podrás ser beneficiario de una beca a la vez.
                    </p>
                </details>

                {{-- FAQ 5 --}}
                <details
                    class="flex flex-col rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50 px-4 py-2 group">
                    <summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
                        <p class="text-gray-900 dark:text-white text-base font-bold">
                            ¿Qué tipo de documentos necesito para completar mi registro?
                        </p>
                        <span
                            class="material-symbols-outlined text-gray-900 dark:text-white group-open:rotate-180 transition-transform duration-300">
                            expand_more
                        </span>
                    </summary>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal pb-2">
                        Generalmente necesitarás un documento de identidad, tu último comprobante de estudios
                        (certificado, constancia o historial académico), una carta de exposición de motivos y tu
                        currículum vitae. Algunos programas pueden solicitar documentos adicionales.
                    </p>
                </details>
            </div>

            {{-- Sección de contacto --}}
            <div class="mt-12">
                <h2 class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pt-5 text-center md:text-left">
                    ¿Necesitas ayuda personalizada?
                </h2>

                <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal pb-3 pt-1 text-center md:text-left">
                    Si no encontraste la respuesta a tu pregunta, puedes comunicarte con el equipo de PROMUBE – CIDECH
                    a través de los siguientes medios.
                </p>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Tarjeta de contacto --}}
                    <div class="flex flex-col gap-6">
                        <div
                            class="p-6 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50">
                            <ul class="space-y-4">
                                <li class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-primary text-2xl">mail</span>
                                    <a href="mailto:contacto@promube.pe"
                                       class="text-gray-800 dark:text-gray-300 hover:text-primary">
                                        contacto@promube.pe
                                    </a>
                                </li>
                                <li class="flex items-center gap-4">
                                    <span class="material-symbols-outlined text-primary text-2xl">call</span>
                                    <span class="text-gray-800 dark:text-gray-300">
                                        +51 9XX XXX XXX
                                    </span>
                                </li>
                            </ul>

                            <button
                                type="button"
                                class="mt-6 w-full flex items-center justify-center gap-2 min-w-[84px] cursor-pointer overflow-hidden rounded-lg h-12 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="w-5 h-5" fill="currentColor">
                                    <path
                                        d="M16.75 13.96c.25.13.41.38.41.67v2.24c0 .67-.59 1.13-1.24.98-2.48-.56-4.75-2.03-6.6-3.89-1.85-1.85-3.32-4.12-3.88-6.6-.15-.65.31-1.24.98-1.24h2.24c.29 0 .54.16.67.41.43.88.93 1.73 1.49 2.54.17.26.21.58.11.88l-.51 1.52c-.12.35.01.75.29 1.01l2.52 2.52c.26.28.66.41 1.01.29l1.52-.51c.3-.1.62-.06.88.11.81.56 1.66 1.06 2.54 1.49zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.52 0 10-4.48 10-10S17.52 2 12 2z" />
                                </svg>
                                <span>Escribir por WhatsApp</span>
                            </button>
                        </div>

                        {{-- Redes sociales --}}
                        <div
                            class="p-6 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
                                Síguenos
                            </h3>
                            <div class="flex flex-col gap-4">
                                <a href="#"
                                   class="flex items-center gap-3 text-gray-800 dark:text-gray-300 hover:text-primary">
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                    </svg>
                                    <span>/PROMUBE.oficial</span>
                                </a>

                                <a href="#"
                                   class="flex items-center gap-3 text-gray-800 dark:text-gray-300 hover:text-primary">
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 0 .14.02.2.04.54.08 1.08.18 1.62.33.82.23 1.6.58 2.3 1.09.74.54 1.38 1.18 1.92 1.92.55.74 1 1.54 1.25 2.42.25.88.42 1.79.52 2.71.08.73.1 1.47.11 2.21.01.82.01 1.65.01 2.47 0 .83-.01 1.66-.02 2.49-.01.73-.03 1.46-.11 2.19-.1.92-.27 1.82-.53 2.71-.25.88-.6 1.68-1.09 2.42-.54.74-1.18 1.38-1.92 1.92-.74.55-1.54 1-2.42 1.25-.88.25-1.79.42-2.71.52-.73.08-1.47.1-2.21.11-.82.01-1.65.01-2.47.01-.83 0-1.66-.01-2.49-.02-.73-.01-1.46-.03-2.19-.11-.92-.1-1.82-.27-2.71-.53-.88-.25-1.68-.6-2.42-1.09-.74-.54-1.38-1.18-1.92-1.92-.55-.74-1-1.54-1.25-2.42-.25-.88-.42-1.79-.52-2.71-.08-.73-.1-1.47-.11-2.21-.01-.82-.01-1.65-.01-2.47 0-.83.01-1.66.02-2.49.01-.73.03-1.46.11-2.19.1-.92.27-1.82.53-2.71.25-.88.6-1.68 1.09-2.42.54-.74 1.18-1.38 1.92-1.92.74-.55 1.54-1 2.42-1.25.88-.25 1.79-.42 2.71-.52.73-.08 1.47-.1 2.21-.11.82-.01 1.65-.01 2.47-.01Z" />
                                    </svg>
                                    <span>@promube.cidech</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Formulario de contacto (solo vista pública por ahora) --}}
                    <form
                        method="POST"
                        action="#"
                        class="flex flex-col gap-4 p-6 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-background-dark/50">
                        @csrf

                        <div>
                            <label for="name"
                                   class="block text-sm font-medium text-gray-800 dark:text-gray-300 mb-1">
                                Nombre
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Tu nombre completo"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600
                                       dark:bg-gray-700 dark:text-white focus:border-primary focus:ring-primary" />
                        </div>

                        <div>
                            <label for="email"
                                   class="block text-sm font-medium text-gray-800 dark:text-gray-300 mb-1">
                                Correo electrónico
                            </label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="tu@email.com"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600
                                       dark:bg-gray-700 dark:text-white focus:border-primary focus:ring-primary" />
                        </div>

                        <div>
                            <label for="message"
                                   class="block text-sm font-medium text-gray-800 dark:text-gray-300 mb-1">
                                Mensaje
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Escribe tu consulta aquí..."
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600
                                       dark:bg-gray-700 dark:text-white focus:border-primary focus:ring-primary"></textarea>
                        </div>

                        <button
                            type="submit"
                            class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden
                                   rounded-lg h-12 px-4 bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-900
                                   text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-900 dark:hover:bg-white">
                            <span class="truncate">Enviar consulta</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
