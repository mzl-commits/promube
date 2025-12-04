@extends('layouts.public')

@section('title', 'Inicio')

@section('content')
    {{-- Estilo sólo para el fondo del héroe (si no quieres tocar el layout) --}}
    <style>
        .hero-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("https://lh3.googleusercontent.com/aida-public/AB6AXuDVAaXoXAVOSubfh8DH8332sqkkCozu99bI-_J2_0e6fZFDdS5X-5TUjS_r-KkfOLZwYTJE8xrvReZUEt8po5s6s80IQV7B9PbDAUYxunLrFP246DQAAckjyXrAJnJPWhwInZPIqmwa3ICR7CrR8di0_biUhSJEWuMzoyhkJ62NZi3MBobwaMqmSRChlwbKBGSB_GZzFhyOXhHeb1CBymS-zo57uJjUkgdy5oXSYuGtkoSFuoIJOs4TQ3U113xNXFue2QUw2nsHp54");
            background-size: cover;
            background-position: center;
        }
    </style>

    {{-- HERO --}}
    <section class="hero-bg text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-8 py-20 md:py-28 text-center md:text-left">
            <div class="max-w-3xl">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-black leading-tight tracking-[-0.04em] mb-4">
                    <span class="text-primary">PROMUBE</span> conecta talento<br class="hidden sm:block" />
                    con oportunidades educativas
                </h1>
                <p class="text-base sm:text-lg text-gray-200 mb-8">
                    Promoción Municipal de Becas de Estudios CIDECH. Impulsamos el futuro académico y profesional de estudiantes de distintas regiones, articulando programas, becas y aliados estratégicos.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a href="#becas"
                       class="inline-flex items-center justify-center bg-primary text-white font-semibold py-3 px-6 rounded-lg hover:bg-red-700 transition-colors">
                        Ver becas disponibles
                    </a>
                    <a href="#sobre-promube"
                       class="inline-flex items-center justify-center bg-white/10 hover:bg-white/20 text-sm font-medium rounded-lg py-3 px-6 border border-white/40">
                        Conocer más sobre PROMUBE
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- BECAS DESTACADAS --}}
    <section id="becas" class="py-16 md:py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-10 text-gray-900 dark:text-white">
                Descubre nuestras becas destacadas
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Principal --}}
                <article class="md:col-span-2 bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                    <img class="w-full h-64 object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE"
                         alt="Fachada de universidad con escalinatas" />
                    <div class="p-8">
                        <p class="text-xs uppercase tracking-[0.12em] text-primary mb-2">
                            Académica · Licenciatura · Presencial
                        </p>
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                            Beca de Excelencia Académica PROMUBE–CIDECH
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm">
                            Dirigida a estudiantes con rendimiento sobresaliente que inician o continúan estudios superiores en alianza con municipalidades y universidades.
                        </p>
                        <a href="#"
                           class="inline-flex items-center gap-1 font-semibold text-primary hover:text-red-700 text-sm">
                            Saber más
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </article>

                {{-- Columna derecha --}}
                <div class="space-y-8">
                    <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                        <img class="w-full h-40 object-cover"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY"
                             alt="Laboratorio de ciencias" />
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-1 text-gray-900 dark:text-white">
                                Beca de Apoyo a la Investigación
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                                Investigación · Maestría · Modalidad mixta.
                            </p>
                            <a href="#" class="font-semibold text-primary hover:text-red-700 text-sm">
                                Saber más
                            </a>
                        </div>
                    </article>

                    <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                        <img class="w-full h-40 object-cover"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw"
                             alt="Materiales de arte" />
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-1 text-gray-900 dark:text-white">
                                Beca para Talentos Artísticos
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                                Artes · Todos los niveles · Presencial.
                            </p>
                            <a href="#" class="font-semibold text-primary hover:text-red-700 text-sm">
                                Saber más
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- ALIADOS (MUNICIPALIDADES) --}}
    <section id="sobre-promube" class="pb-16 md:pb-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-8">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 text-gray-900 dark:text-white">
                Trabajo conjunto con municipalidades aliadas
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div class="bg-white dark:bg-[#2b1a1a] p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                    <div class="p-3 mb-3 bg-red-100 dark:bg-red-900/40 rounded-full">
                        <img class="h-8 w-8"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjNg0Wcjux3TCtanPgVBjJ4w4Xs7chq9tQstjwDDVQsCrsRpUc2jxHJdzNvmykzbmskw8W5b1x1OfqVqaEmkay6y4az5620zS6EKB90lewVWLWp16UQxx6MT8n9j1ixEcs3M0fQD7h5okdIk7bSLByE8CEl5bQJrdrV8QIkhuv8OLYC9J6qTKzqmbV3p4CFTIRbRcuBr1qmDQq1ZcyJf7QhUJpQvtfEusPIYeZ0teYRuL9xBGnhfu9psGuAOjdVCQ7SQj7o0OaVe8"
                             alt="Escudo municipal Centro" />
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Municipalidad de Centro</h3>
                </div>

                <div class="bg-white dark:bg-[#2b1a1a] p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition-shadow border border-primary/60">
                    <div class="p-3 mb-3 bg-red-100 dark:bg-red-900/40 rounded-full">
                        <img class="h-8 w-8"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQReQIgKi-fe01YsN08lsV_AbO7S_-81yE4O-ke7xWfiKE-1yIS8MDbszyYflZlZIU9exwnNRVk9zkUVq1o0Xn_i5c--zTb5fyZ-KnYTXPWbzHZdf_ytHa35Rm3aF8SxIPED_Kjmh59HBPdAtH2FPYQz0EDQ8npfPytvaF6bZPOmn9F-EZaCPJHG2QSulZaM5VNQpZsZT40HMugTnvIeChRRpNujdyW-9yAI99Lexi1maCivTsuWmlg4RMg40EcBVOzvd4DQp6WOY"
                             alt="Escudo municipal Norte" />
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Municipalidad de Norte</h3>
                </div>

                <div class="bg-white dark:bg-[#2b1a1a] p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                    <div class="p-3 mb-3 bg-red-100 dark:bg-red-900/40 rounded-full">
                        <img class="h-8 w-8"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxxky7anIVv0xQpyi4LbC3Mx-eSM5NGFUZNI_BppsxV0HIrwKCUBcs5aNEw8mefQ13IRbJy6tTadE_35Tci2x6SqMyui192duJPJOjFc4RDwqdW0Xomwlq_88yTKibqT-L_tf_4DK9Jv7Kgc7m0tRvYf5u4bLqkTgY8HI_e8cO0zJGsPGfpPFbaiFGjupRM3rlTvEqBA3EjKH5SoV2lao3zyk9s8koMBZ1YP4H_jP_nS9WeTdkDDL-YgsnU86MhfQsS4Sy_nFR2tE"
                             alt="Escudo municipal Sur" />
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Municipalidad de Sur</h3>
                </div>

                <div class="bg-white dark:bg-[#2b1a1a] p-6 rounded-xl shadow-md flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                    <div class="p-3 mb-3 bg-red-100 dark:bg-red-900/40 rounded-full">
                        <img class="h-8 w-8"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZJWLzamznL2JepkkKLr-ti_BBfDSwuILt8o5M3SjbHvnkAoUJTSal-Qydr4egybbnI3NU_NMLc23q5URSnzmYy_1fhleBGRQAfL1axTtvkopPpnJeULWBWYKfm1KxR3_4e8R9Wq59mPNW2uDfnJBvGZ9zt2goMTOliLBPJ2xpl1qQCUhT5CKAnupen09bC2qMNLx6TPQwVtTBBFLc1pvYrK1MCXhxHFHNX0Jr6cktaR34KOeGTKJc_yyKuSydIi_d7uqlaDgb87g"
                             alt="Escudo municipal Occidente" />
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Municipalidad de Occidente</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIOS --}}
    <section class="pb-16 md:pb-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-10 text-gray-900 dark:text-white">
                Historias de cambio
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- 1 --}}
                <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md p-6 flex items-center gap-6">
                    <img class="w-20 h-20 rounded-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"
                         alt="Retrato de Juan Pérez" />
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Juan Pérez</h4>
                        <p class="text-sm text-primary font-semibold">
                            Beca Académica 2023 · Región Norte
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300 italic">
                            "Gracias a PROMUBE pude acceder a una educación de calidad que transformó mi carrera. El apoyo fue fundamental."
                        </p>
                    </div>
                </article>

                {{-- 2 --}}
                <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md p-6 flex items-center gap-6">
                    <img class="w-20 h-20 rounded-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtZ-CDAub-k25C4b9XHiXcP0q16s7jyp--A98FEULKdN6R99TRO7jCEn7soMCu9VczjFwRGuSpZTbPR7Hl8qNDI8Coin03EQHTnH01taic6T6bllrywSEqL8yo5bblqJfodvqYWQPzNXpX9uLsM2sVm9cGA1adwoCvg5AIQglOargmdcdRIOElkK0xRgLOhveHlE07f6pc97NfOrETObngAqGe2EO_2YZekdnph3pEylqDu7aaT35jixS1RR-MEYE_3zFgCrcIM4o"
                         alt="Retrato de María García" />
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">María García</h4>
                        <p class="text-sm text-primary font-semibold">
                            Programa de Intercambio 2022 · Región Centro
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300 italic">
                            "La experiencia del intercambio cultural amplió mis horizontes y me abrió puertas que nunca imaginé."
                        </p>
                    </div>
                </article>

                {{-- 3 --}}
                <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md p-6 flex items-center gap-6">
                    <img class="w-20 h-20 rounded-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpU8KRoESuLjsteSfH1lWkdg1LoqGRKWwat75Cq0WvbRZdn0_1CI5TXhYY1e6ubPn84OTDvZe-ArBPgbvPF-3MM--0nUHbCI2rQushsWLD91ie5ypH_pHBoxmF9hP9XZWvRlroxW-KckrNeyt5uAUlzabo07HRUz3PSsaNg9YBDF_XYeTkokXs5fSPNdYaI5OVgLKsy2wx1DReDq1p9RBFVzhNNqpFoviS7v9Y_TEOec97tfMi-QID2VANgqYP_wreXk-e4vUrGvU"
                         alt="Retrato de Carlos Rodríguez" />
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Carlos Rodríguez</h4>
                        <p class="text-sm text-primary font-semibold">
                            Beca de Investigación 2023 · Región Sur
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300 italic">
                            "El apoyo para mi proyecto de investigación fue crucial. PROMUBE creyó en mi potencial."
                        </p>
                    </div>
                </article>

                {{-- 4 --}}
                <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md p-6 flex items-center gap-6">
                    <img class="w-20 h-20 rounded-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMWO09q38ZN4aaSh-zy4hY3A9aluAy7WeSaahQH_464-GueR82ZcwzVy2ec9DAJfokqV-0s5SEp4GNEfaM6rcWIsFk2ebagMayohn-6-ZE7Y-jCkQKvTA43OzLxQyT_0FuoHTa8XlJfgcvx4tpgJlwBy3yFMOUEz-WGtu3FYKtesjdQAmlByLogzOxZUWFQEtkj4y0Kr3L8AXDHGIGiv9c61QU_9Ayahyw5NsLLs8lBHPtZU8jSiLExBOX6YFKthnX70H8WtUingQ"
                         alt="Retrato de Ana Martínez" />
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Ana Martínez</h4>
                        <p class="text-sm text-primary font-semibold">
                            Beca Deportiva 2023 · Región Occidente
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300 italic">
                            "Combinar mi pasión por el deporte con mis estudios fue posible gracias a esta beca."
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- SEDES --}}
    <section class="pb-16 md:pb-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-10 text-gray-900 dark:text-white">
                Conoce nuestras sedes
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md overflow-hidden">
                    <img class="w-full h-56 object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd2_H08jilsWIyRClEVK8eRTHnJGc3jQKquVDiSoNGEmoEB0C6UCpS7WeA8aDPrO52EOkPAKHDWRSSDC-CvWlIn_NF_xhC7D77LVrpgHAWwwZUYdgrD9MNYUhAJPn7H1g40rCQNKpMSsI8w1pnFQnDuHRLeFLZ5JWnmxFqjoby8WiAddfI1QE-0yVUXwJn1BOTldsaWXw3NK5bk6E1Nd9-wP0qxr1pTSn0WZul-HeY6eu5E7RZpploWOPfTa6-5N3ra-k2AbbdoYI"
                         alt="Edificio moderno CIDECH" />
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Sede Central CIDECH</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">
                            <span class="font-semibold">Dirección:</span> Av. Universidad 1234, Col. Centro, Ciudad de México.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            <span class="font-semibold">Atención:</span> Lunes a Viernes, 9:00 – 18:00.
                        </p>
                        <a href="#"
                           class="block text-center w-full bg-primary text-white font-bold py-2.5 rounded-lg hover:bg-red-700 transition-colors">
                            Ver más
                        </a>
                    </div>
                </article>

                <article class="bg-white dark:bg-[#2b1a1a] rounded-xl shadow-md overflow-hidden">
                    <img class="w-full h-56 object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiapKTJC8xcc7tkIfBrgC_FyqQlJ9OJ2UKNO07Zn7DYyoBJF-WSsgB3AJ_Qhuv7-n7N4D4xk7E2__eeQkdC-7ITFPyjGPBCmN8uiFtl4rnFbeT7t4ioAKfwjUFfFDDgijzBfMFgvVpiWS-EHiaKdNeGqoWFXOVphvMsFx1MQu2nNeoG_hJDWRV9YXisLjkhE7v3j69MJquAhDtDOEppbV4pOiJjzhINDrhZ36WrXQ0YL0a2VTepauikYBVK6jYxgyx55XuPnwaVZs"
                         alt="Parque de oficinas Sede Norte" />
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Sede Norte</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">
                            <span class="font-semibold">Dirección:</span> Calle del Sol 567, Plaza Norte, Monterrey.
                        </p>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            <span class="font-semibold">Atención:</span> Lunes a Viernes, 10:00 – 17:00.
                        </p>
                        <a href="#"
                           class="block text-center w-full bg-primary text-white font-bold py-2.5 rounded-lg hover:bg-red-700 transition-colors">
                            Ver más
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
