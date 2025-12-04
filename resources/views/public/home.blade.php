@extends('layouts.public')

@section('title', 'Inicio')

@section('content')
    <style>
        .hero-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("https://lh3.googleusercontent.com/aida-public/AB6AXoXAVOSubfh8DH8332sqkkCozu99bI-_J2_0e6fZFDdS5X-5TUjS_r-KkfOLZwYTJE8xrvReZUEt8po5s6s80IQV7B9PbDAUYxunLrFP246DQAAckjyXrAJnJPWhwInZPIqmwa3ICR7CrR8di0_biUhSJEWuMzoyhkJ62NZi3MBobwaMqmSRChlwbKBGSB_GZzFhyOXhHeb1CBym-zo57uJjUkgdy5oXSYuGtkoSFuoIJOs4TQ3U113xNXFue2QUw2nsHp54");
            background-size: cover;
            background-position: center;
        }

        /* ---------- HERO: animación más lenta y notoria ---------- */
        @keyframes slideUpHero {
            from {
                opacity: 0;
                transform: translateY(55px);
            }
            60% {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            animation: slideUpHero 2s ease-out forwards;
        }

        .hero-description {
            animation: slideUpHero 2.4s ease-out forwards;
            animation-delay: 0.2s;
        }

        .hero-button {
            animation: slideUpHero 2.8s ease-out forwards;
            animation-delay: 0.4s;
        }

        /* ---------- BECAS: diseño anterior (tres tarjetas iguales) ---------- */
        [data-becas-carousel] > article {
            border-radius: 0.75rem;
            overflow: hidden;
            background-color: #ffffff;
            border: 1px solid rgba(148, 163, 184, 0.45);
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.1);
            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }

        .dark [data-becas-carousel] > article {
            background-color: #1f2937;
            border-color: rgba(55, 65, 81, 0.8);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.6);
        }

        [data-becas-carousel] > article:hover {
            transform: translateY(-10px);
            border-color: #D9363E;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.24);
        }

        [data-becas-carousel] > article img {
            display: block;
        }

        /* Animaciones suaves para el carrusel de becas */
        @keyframes becaOut {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(-8px); }
        }
        @keyframes becaIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .beca-anim-out {
            animation: becaOut 0.45s ease-in forwards;
        }
        .beca-anim-in {
            animation: becaIn 0.45s ease-out forwards;
        }

        /* ---------- MUNICIPALIDADES: tarjetas + escudos ---------- */
        .municipality-card {
            transition: transform 0.45s ease, box-shadow 0.45s ease, opacity 0.45s ease;
        }

        .municipality-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.18);
        }

        .municipality-badge {
            width: 4rem;
            height: 4rem;
            border-radius: 1.25rem;
            background: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotate(45deg);
            overflow: hidden;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.3);
            margin-bottom: 1rem;
        }

        .municipality-badge img {
            transform: rotate(-45deg);
            width: 2.25rem;
            height: 2.25rem;
            object-fit: contain;
        }

        /* ---------- ALUMNOS ---------- */
        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.94); }
            to   { opacity: 1; transform: scale(1); }
        }

        .student-profile {
            animation: fadeInScale 0.8s ease-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 1.5rem;
            box-shadow: 0 16px 38px rgba(15, 23, 42, 0.18);
        }

        .student-profile:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 22px 50px rgba(15, 23, 42, 0.25);
        }

        .student-profile:nth-child(1) { animation-delay: 0.05s; }
        .student-profile:nth-child(2) { animation-delay: 0.1s; }
        .student-profile:nth-child(3) { animation-delay: 0.15s; }
        .student-profile:nth-child(4) { animation-delay: 0.2s; }

        /* ---------- SEDES: mismo estilo que alumnos, pero más ligero ---------- */
        @keyframes fadeUpLight {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .location-card {
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.14);
            animation: fadeUpLight 0.7s ease-out;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .location-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 42px rgba(15, 23, 42, 0.22);
        }

        .dark .location-card {
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.6);
        }
    </style>

    {{-- HERO --}}
    <section class="hero-bg text-white">
        <div class="container mx-auto px-6 py-28 md:py-48 text-center">
            <h1 class="hero-title text-4xl md:text-7xl font-black mb-4 uppercase">
                Oportunidades que transforman
            </h1>
            <p class="hero-description max-w-3xl mx-auto mb-8 text-lg md:text-xl text-gray-200">
                Encuentra la beca o programa educativo perfecto para impulsar tu futuro académico y profesional.
            </p>
            <a href="#becas"
               class="hero-button inline-block bg-white text-primary font-bold py-3 px-10 rounded-full hover:bg-gray-200 transition-colors text-lg">
                Explorar Becas
            </a>
        </div>
    </section>

    {{-- BECAS DESTACADAS --}}
    <section id="becas" class="py-16 md:py-24 bg-section-light dark:bg-section-dark">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white">
                Becas Destacadas
            </h2>

            <div data-becas-carousel class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- 1: Apoyo a la Investigación --}}
                <article>
                    <img
                        alt="Equipo de laboratorio de ciencias con tubos de ensayo y matraces"
                        class="w-full h-64 object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqT5bOwqFGI9AT3NCbmrUvr4QMG-_jIf7Dfmq0XM8qM2NeCUrVGbX0yrHnegIQDlpJUa7n3bGtSJVPDFblF3jcAwJZzJW9yEBUyVZ04BNi9ualLknOd-opJrQCJGdqau_APHvvH5Id9TdCM4aLmcyuf-4EgH92Sta3ZYzFmzLhzvi6AyUOa0eRJPNCCI5zXRAATGD6aL8qh97DRi0P3CwOolBVp16_tC_FK5JeG_oD37J9tQ5zWifDXsCzVtMpmwQmx4OfX_QwvrY"/>
                    <div class="p-8">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                            Beca de Apoyo a la Investigación
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">
                            Tipo: Investigación | Nivel: Maestría | Modalidad: Mixta
                        </p>
                        <a href="#"
                           class="font-semibold text-primary hover:text-red-700 transition-colors">
                            Saber más
                        </a>
                    </div>
                </article>

                {{-- 2: Talentos Artísticos --}}
                <article>
                    <img
                        alt="Suministros de arte con pinceles, lienzos y caballetes"
                        class="w-full h-64 object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuADv_BqHe8beMwKtTYPZtrC7KT0_BOv6MDJf5AGBzQMW-Zp_IBt_FTnkTHClhJ28N1dRhs2XLKYUlB31wZYCJmEcAinNBAQ4GnalH4cL4Utfw7P-3Y77bFgAfCONA6r_Nvtk6BUaFhZ6UEzvSklFHvhf6BDMnnKF7fdUS3TxZdIWrdRW_SxCXVz9zGZQz4jdDg-pro2k_id7tiF-0W8yKsdNx67w-SSWkpYK3Tn0OpfTKv2o_SmmCFdFn5vLtfLvZrKnsAtufQ33Kw"/>
                    <div class="p-8">
                        <h3 class="text-lg font-bold mb-1 text-gray-900 dark:text-white">
                            Beca para Talentos Artísticos
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">
                            Tipo: Artística | Nivel: Todos | Modalidad: Presencial
                        </p>
                        <a href="#"
                           class="font-semibold text-primary hover:text-red-700 transition-colors">
                            Saber más
                        </a>
                    </div>
                </article>

                {{-- 3: Excelencia Académica --}}
                <article>
                    <img
                        alt="Gran edificio universitario con columnas y escaleras"
                        class="w-full h-64 object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDb3rjnH-tOJDQRjWL8sJngsXXulCafaehs9nDjeAu6zYizs98lX8A_bo54lS2g7vgvdqjkzewg6f-Ic5WxBlPygioYggDKlrDOQo3s2VxqjzqyTcWx7XrH7U5V95QuEH_r6kyoM3UA2g3bP1EeAFT3EAdTblR8q8X6CtM4rE2uQ7c6OGXldSgWRWjYMRY39Rg47GXpcodlmrH_4IXrUg4zEfxirtMnQgYQoUJQPMcI_spSx-NfQ7wKHrcwC8Q1shtPOLaE7_m9LrE"/>
                    <div class="p-8">
                        <h3 class="text-lg font-bold mb-1 text-gray-900 dark:text-white">
                            Beca de Excelencia Académica
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm">
                            Tipo: Académica | Nivel: Licenciatura | Modalidad: Presencial
                        </p>
                        <a href="#"
                           class="font-semibold text-primary hover:text-red-700 transition-colors">
                            Saber más
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- MUNICIPALIDADES ALIADAS --}}
    <section class="py-16 md:py-24 bg-background-light dark:bg-background-dark">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white">
                Municipalidades Aliadas
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8" data-municipios-grid>
                <div class="municipality-card bg-section-light dark:bg-section-dark p-6 rounded-lg flex flex-col items-center justify-center text-center">
                    <div class="municipality-badge">
                        <img alt="Escudo municipal Centro"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjNg0Wcjux3TCtanPgVBjJ4w4Xs7chq9tQstjwDDVQsCrsRpUc2jxHJdzNvmykzbmskw8W5b1x1OfqVqaEmkay6y4az5620zS6EKB90lewVWLWp16UQxx6MT8n9j1ixEcs3M0fQD7h5okdIk7bSLByE8CEl5bQJrdrV8QIkhuv8OLYC9J6qTKzqmbV3p4CFTIRbRcuBr1qmDQq1ZcyJf7QhUJpQvtfEusPIYeZ0teYRuL9xBGnhfu9psGuAOjdVCQ7SQj7o0OaVe8"/>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Municipalidad de Centro</h3>
                </div>

                <div class="municipality-card bg-section-light dark:bg-section-dark p-6 rounded-lg flex flex-col items-center justify-center text-center">
                    <div class="municipality-badge">
                        <img alt="Escudo municipal Norte"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQReQIgKi-fe01YsN08lsV_AbO7S_-81yE4O-ke7xWfiKE-1yIS8MDbszyYflZlZIU9exwnNRVk9zkUVq1o0Xn_i5c--zTb5fyZ-KnYTXPWbzHZdf_ytHa35Rm3aF8SxIPED_Kjmh59HBPdAtH2FPYQz0EDQ8npfPytvaF6bZPOmn9F-EZaCPJHG2QSulZaM5VNQpZsZT40HMugTnvIeChRRpNujdyW-9yAI99Lexi1maCivTsuWmlg4RMg40EcBVOzvd4DQp6WOY"/>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Municipalidad de Norte</h3>
                </div>

                <div class="municipality-card bg-section-light dark:bg-section-dark p-6 rounded-lg flex flex-col items-center justify-center text-center">
                    <div class="municipality-badge">
                        <img alt="Escudo municipal Sur"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxxky7anIVv0xQpyi4LbC3Mx-eSM5NGFUZNI_BppsxV0HIrwKCUBcs5aNEw8mefQ13IRbJy6tTadE_35Tci2x6SqMyui192duJPJOjFc4RDwqdW0Xomwlq_88yTKibqT-L_tf_4DK9Jv7Kgc7m0tRvYf5u4bLqkTgY8HI_e8cO0zJGsPGfpPFbaiFGjupRM3rlTvEqBA3EjKH5SoV2lao3zyk9s8koMBZ1YP4H_jP_nS9WeTdkDDL-YgsnU86MhfQsS4Sy_nFR2tE"/>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Municipalidad de Sur</h3>
                </div>

                <div class="municipality-card bg-section-light dark:bg-section-dark p-6 rounded-lg flex flex-col items-center justify-center text-center">
                    <div class="municipality-badge">
                        <img alt="Escudo municipal Occidente"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZJWLzamznL2JepkkKLr-ti_BBfDSwuILt8o5M3SjbHvnkAoUJTSal-Qydr4egybbnI3NU_NMLc23q5URSnzmYy_1fhleBGRQAfL1axTtvkopPpnJeULWBWYKfm1KxR3_4e8R9Wq59mPNW2uDfnJBvGZ9zt2goMTOliLBPJ2xpl1qQCUhT5CKAnupen09bC2qMNLx6TPQwVtTBBFLc1pvYrK1MCXhxHFHNX0Jr6cktaR34KOeGTKJc_yyKuSydIi_d7uqlaDgb87g"/>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Municipalidad de Occidente</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- ALUMNOS BENEFICIADOS --}}
    <section class="py-16 md:py-24 bg-section-light dark:bg-section-dark">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white">
                Alumnos Beneficiados
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="student-profile bg-white dark:bg-gray-800 rounded-lg p-6 flex items-center space-x-6">
                    <img alt="Retrato de Juan Pérez"
                         class="w-20 h-20 rounded-full object-cover flex-shrink-0"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuByk8OgTgtv_Epn23gLOB2dvUFQZoSEdH6Yh-xJaA7Cy6jjwfLdEF9O-YR56DRbI_H7bQqJNnUsonVyyiXvnBFPb1dgi4_hy-mYhiPDdA4qaWKzC--5urvzaTJkSkyCiOh5B-sPKeBovAax32rEujmMa285QuIMLqXFbq4cUM-G9rupld6CjAqxtH8lOn-Dtft0iiggVZtq53VyZPdlJZ7wJuCGZ12Yp8wRM4se0pps6DGoOy8revcVhLf72c5GYJjt3HRLGd6aEfg"/>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Juan Pérez</h4>
                        <p class="text-sm text-primary font-semibold">Beca Académica, 2023</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Región Norte</p>
                        <p class="text-gray-700 dark:text-gray-300 italic text-sm">
                            "Gracias a PROMUBE, pude acceder a una educación de calidad que transformó mi carrera. El apoyo fue fundamental."
                        </p>
                    </div>
                </div>

                <div class="student-profile bg-white dark:bg-gray-800 rounded-lg p-6 flex items-center space-x-6">
                    <img alt="Retrato de María García"
                         class="w-20 h-20 rounded-full object-cover flex-shrink-0"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtZ-CDAub-k25C4b9XHiXcP0q16s7jyp--A98FEULKdN6R99TRO7jCEn7soMCu9VczjFwRGuSpZTbPR7Hl8qNDI8Coin03EQHTnH01taic6T6bllrywSEqL8yo5bblqJfodvqYWQPzNXpX9uLsM2sVm9cGA1adwoCvg5AIQglOargmdcdRIOElkK0xRgLOhveHlE07f6pc97NfOrETObngAqGe2EO_2YZekdnph3pEylqDu7aaT35jixS1RR-MEYE_3zFgCrcIM4o"/>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">María García</h4>
                        <p class="text-sm text-primary font-semibold">Programa de Intercambio, 2022</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Región Centro</p>
                        <p class="text-gray-700 dark:text-gray-300 italic text-sm">
                            "La experiencia del intercambio cultural amplió mis horizontes y me abrió puertas que nunca imaginé. ¡Una oportunidad increíble!"
                        </p>
                    </div>
                </div>

                <div class="student-profile bg-white dark:bg-gray-800 rounded-lg p-6 flex items-center space-x-6">
                    <img alt="Retrato de Carlos Rodríguez"
                         class="w-20 h-20 rounded-full object-cover flex-shrink-0"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpU8KRoESuLjsteSfH1lWkdg1LoqGRKWwat75Cq0WvbRZdn0_1CI5TXhYY1e6ubPn84OTDvZe-ArBPgbvPF-3MM--0nUHbCI2rQushsWLD91ie5ypH_pHBoxmF9hP9XZWvRlroxW-KckrNeyt5uAUlzabo07HRUz3PSsaNg9YBDF_XYeTkokXs5fSPNdYaI5OVgLKsy2wx1DReDq1p9RBFVzhNNqpFoviS7v9Y_TEOec97tfMi-QID2VANgqYP_wreXk-e4vUrGvU"/>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Carlos Rodríguez</h4>
                        <p class="text-sm text-primary font-semibold">Beca de Investigación, 2023</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Región Sur</p>
                        <p class="text-gray-700 dark:text-gray-300 italic text-sm">
                            "El apoyo para mi proyecto de investigación fue crucial. PROMUBE creyó en mi potencial y me dio las herramientas para innovar."
                        </p>
                    </div>
                </div>

                <div class="student-profile bg-white dark:bg-gray-800 rounded-lg p-6 flex items-center space-x-6">
                    <img alt="Retrato de Ana Martínez"
                         class="w-20 h-20 rounded-full object-cover flex-shrink-0"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMWO09q38ZN4aaSh-zy4hY3A9aluAy7WeSaahQH_464-GueR82ZcwzVy2ec9DAJfokqV-0s5SEp4GNEfaM6rcWIsFk2ebagMayohn-6-ZE7Y-jCkQKvTA43OzLxQyT_0FuoHTa8XlJfgcvx4tpgJlwBy3yFMOUEz-WGtu3FYKtesjdQAmlByLogzOxZUWFQEtkj4y0Kr3L8AXDHGIGiv9c61QU_9Ayahyw5NsLLs8lBHPtZU8jSiLExBOX6YFKthnX70H8WtUingQ"/>
                    <div>
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Ana Martínez</h4>
                        <p class="text-sm text-primary font-semibold">Beca Deportiva, 2023</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Región Occidente</p>
                        <p class="text-gray-700 dark:text-gray-300 italic text-sm">
                            "Combinar mi pasión por el deporte con mis estudios fue posible gracias a esta beca. Un sueño hecho realidad."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SEDES --}}
    <section class="py-16 md:py-24 bg-background-light dark:bg-background-dark">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white">
                Conoce nuestras Sedes
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="location-card bg-section-light dark:bg-section-dark">
                    <img alt="Edificio de oficinas moderno CIDECH"
                         class="w-full h-56 object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd2_H08jilsWIyRClEVK8eRTHnJGc3jQKquVDiSoNGEmoEB0C6UCpS7WeA8aDPrO52EOkPAKHDWRSSDC-CvWlIn_NF_xhC7D77LVrpgHAWwwZUYdgrD9MNYUhAJPn7H1g40rCQNKpMSsI8w1pnFQnDuHRLeFLZ5JWnmxFqjoby8WiAddfI1QE-0yVUXwJn1BOTldsaWXw3NK5bk6E1Nd9-wP0qxr1pTSn0WZul-HeY6eu5E7RZpploWOPfTa6-5N3ra-k2AbbdoYI"/>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Sede Central CIDECH</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-1">
                            <span class="font-semibold">Dirección:</span> Av. Universidad 1234, Col. Centro, Ciudad de México.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            <span class="font-semibold">Atención:</span> Lunes a Viernes, 9am - 6pm.
                        </p>
                        <a href="#"
                           class="block text-center w-full bg-primary text-white font-bold py-2.5 px-6 rounded-lg hover:bg-red-700 transition-colors">
                            Ver más
                        </a>
                    </div>
                </div>

                <div class="location-card bg-section-light dark:bg-section-dark">
                    <img alt="Parque de oficinas corporativas Sede Norte"
                         class="w-full h-56 object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiapKTJC8xcc7tkIfBrgC_FyqQlJ9OJ2UKNO07Zn7DYyoBJF-WSsgB3AJ_Qhuv7-n7N4D4xk7E2__eeQkdC-7ITFPyjGPBCmN8uiFtl4rnFbeT7t4ioAKfwjUFfFDDgijzBfMFgvVpiWS-EHiaKdNeGqoWFXOVphvMsFx1MQu2nNeoG_hJDWRV9YXisLjkhE7v3j69MJquAhDtDOEppbV4pOiJjzhINDrhZ36WrXQ0YL0a2VTepauikYBVK6jYxgyx55XuPnwaVZs"/>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Sede Norte</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-1">
                            <span class="font-semibold">Dirección:</span> Calle del Sol 567, Plaza Norte, Monterrey.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            <span class="font-semibold">Atención:</span> Lunes a Viernes, 10am - 5pm.
                        </p>
                        <a href="#"
                           class="block text-center w-full bg-primary text-white font-bold py-2.5 px-6 rounded-lg hover:bg-red-700 transition-colors">
                            Ver más
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JS para rotación de becas y municipalidades --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Carrusel de becas: rotación suave
            const becasContainer = document.querySelector('[data-becas-carousel]');
            if (becasContainer) {
                let becaIsAnimating = false;

                setInterval(() => {
                    if (becaIsAnimating) return;
                    const first = becasContainer.firstElementChild;
                    if (!first) return;

                    becaIsAnimating = true;
                    first.classList.add('beca-anim-out');

                    first.addEventListener('animationend', function handler() {
                        first.removeEventListener('animationend', handler);
                        first.classList.remove('beca-anim-out');
                        becasContainer.appendChild(first);
                        first.classList.add('beca-anim-in');

                        setTimeout(() => {
                            first.classList.remove('beca-anim-in');
                            becaIsAnimating = false;
                        }, 450); // coincide con duración de la animación
                    }, { once: true });
                }, 6000); // un poco más pausado
            }

            // Municipalidades: mueve el último al inicio para que "giren" de posición
            const muniContainer = document.querySelector('[data-municipios-grid]');
            if (muniContainer) {
                setInterval(() => {
                    const last = muniContainer.lastElementChild;
                    if (last) {
                        muniContainer.insertBefore(last, muniContainer.firstElementChild);
                    }
                }, 3800);
            }
        });
    </script>
@endsection
