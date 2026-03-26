<!DOCTYPE html>

<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>PROMUBE - Login Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
          tailwind.config = {
            darkMode: "class",
            theme: {
              extend: {
                colors: {
                  "on-error-container": "#782232",
                  "background": "#fbf8fc",
                  "secondary-dim": "#535356",
                  "surface-container-low": "#f5f2f8",
                  "secondary-fixed-dim": "#d6d3d7",
                  "on-surface": "#31323a",
                  "inverse-primary": "#8582ff",
                  "on-secondary-fixed": "#3f3f42",
                  "primary": "#4d44e3",
                  "primary-dim": "#4034d7",
                  "on-secondary": "#fbf8fc",
                  "on-background": "#31323a",
                  "secondary-container": "#e4e1e6",
                  "tertiary-fixed-dim": "#a14ef0",
                  "on-primary-fixed-variant": "#4a40e0",
                  "on-surface-variant": "#5e5e67",
                  "on-primary-container": "#3f33d6",
                  "tertiary-dim": "#7717c6",
                  "tertiary-container": "#af5cfe",
                  "on-tertiary-fixed": "#000000",
                  "outline": "#7a7a83",
                  "primary-fixed-dim": "#d2d0ff",
                  "error-dim": "#4f0116",
                  "surface-container-high": "#e9e7f0",
                  "primary-container": "#e2dfff",
                  "surface-container-highest": "#e3e1ec",
                  "error-container": "#ff8b9a",
                  "on-secondary-fixed-variant": "#5c5b5e",
                  "tertiary": "#842cd3",
                  "surface-variant": "#e3e1ec",
                  "secondary-fixed": "#e4e1e6",
                  "on-tertiary": "#fff6ff",
                  "on-error": "#fff7f7",
                  "tertiary-fixed": "#af5cfe",
                  "error": "#9e3f4e",
                  "on-tertiary-container": "#000000",
                  "inverse-on-surface": "#9e9ca0",
                  "surface-container-lowest": "#ffffff",
                  "surface-container": "#efedf4",
                  "on-primary": "#faf6ff",
                  "surface": "#fbf8fc",
                  "inverse-surface": "#0e0e11",
                  "on-tertiary-fixed-variant": "#16002c",
                  "surface-dim": "#dad9e5",
                  "surface-bright": "#fbf8fc",
                  "on-secondary-container": "#525155",
                  "surface-tint": "#4d44e3",
                  "outline-variant": "#b2b1bb",
                  "on-primary-fixed": "#2a13c5",
                  "primary-fixed": "#e2dfff",
                  "secondary": "#5f5e62"
                },
                fontFamily: {
                  "headline": ["Inter"],
                  "body": ["Inter"],
                  "label": ["Inter"]
                },
                borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
              },
            },
          }
        </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .mesh-gradient {
            background-color: #4d44e3;
            background-image: 
                radial-gradient(at 0% 0%, #842cd3 0px, transparent 50%),
                radial-gradient(at 100% 0%, #4d44e3 0px, transparent 50%),
                radial-gradient(at 100% 100%, #af5cfe 0px, transparent 50%),
                radial-gradient(at 0% 100%, #4d44e3 0px, transparent 50%);
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        /* Suppress all browser/Tailwind red validation styles */
        input, input:invalid, input:-moz-ui-invalid {
            box-shadow: none !important;
            outline: none !important;
        }
        input:focus {
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(77,68,227,0.3) !important;
        }
        input[type="checkbox"]:focus {
            box-shadow: 0 0 0 2px rgba(77,68,227,0.2) !important;
        }
        /* Keep border-none inputs truly borderless */
        input.border-none, textarea.border-none {
            border: none !important;
        }
    </style>
</head>
<body class="bg-background font-body text-on-surface selection:bg-primary-container selection:text-on-primary-container">
<main class="min-h-screen flex flex-col md:flex-row">
    <!-- Left Side: Login Form -->
    <section class="w-full md:w-[45%] lg:w-[40%] flex items-center justify-center p-8 md:p-12 lg:p-20 bg-surface">
        <div class="w-full max-w-md space-y-10">
            <!-- Brand Header -->
            <div class="space-y-3">
                <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-primary-container text-primary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance</span>
                </div>
                <div>
                    <h1 class="text-3xl font-black tracking-tight text-on-surface">PROMUBE</h1>
                    <p class="text-on-surface-variant text-sm font-medium mt-1">Gestión Administrativa de Becas</p>
                </div>
            </div>
            
            <!-- Form Section -->
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-5">
                    <!-- Email Input -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold tracking-widest uppercase text-on-surface-variant ml-1" for="email">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">alternate_email</span>
                            </div>
                            <input class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface placeholder:text-outline focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@promube.gob" type="email"/>
                        </div>
                        @error('email')
                            <span class="text-error text-xs font-semibold ml-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Password Input -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold tracking-widest uppercase text-on-surface-variant ml-1" for="password">Contraseña</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">lock</span>
                            </div>
                            <input class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl text-on-surface placeholder:text-outline focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all" id="password" name="password" required autocomplete="current-password" placeholder="••••••••" type="password"/>
                        </div>
                        @error('password')
                            <span class="text-error text-xs font-semibold ml-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Options -->
                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input class="peer h-5 w-5 rounded-md border-none bg-surface-container-high text-primary focus:ring-offset-0 focus:ring-primary/20 cursor-pointer" type="checkbox" name="remember" id="remember"/>
                        </div>
                        <span class="text-sm font-medium text-on-surface-variant group-hover:text-on-surface transition-colors">Recuérdame</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm font-bold text-primary hover:text-primary-dim transition-colors" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>
                
                <!-- Submit Button -->
                <button class="w-full py-4 px-6 bg-primary text-on-primary font-bold rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-dim hover:shadow-primary/30 active:scale-[0.98] transition-all flex items-center justify-center space-x-2" type="submit">
                    <span>Iniciar sesión</span>
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </button>
            </form>
            
            <!-- Footer Sign -->
            <p class="text-center text-xs text-on-surface-variant pt-4">
                Acceso restringido para personal autorizado.
            </p>
        </div>
    </section>
    <!-- Right Side: Decorative Section -->
    <section class="hidden md:flex md:w-[55%] lg:w-[60%] mesh-gradient relative items-center justify-center overflow-hidden">
        <!-- Decorative Grain / Texture Overlap -->
        <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD5hCACs3TFQOBHpQFgS_TGu4A_3WDrwXJMHJWXAYSoYAPwKDaxwxDJiB7V0OGO3RWXzq3-UYG8wdrAMm1u-Hx8qQz2okLkLrx92z7VVj67ZgOhwOtu-kD7SRn6qCSiKwInWBSZiR2t74jex8m5XGnTpsPUwSesKe1d2XKZvqmqcaAy0SqJpGED3AixZTNPMglodxthDS-D5cKA8NIN1D0u1Z4TN5lYsBgx1XRyaUni8HCA6DgyqP_FH8veHTjDsRg1044c6Xgv7iY');"></div>
        <div class="relative z-10 w-full max-w-2xl px-12 text-center space-y-12">
            <!-- Branding Card -->
            <div class="glass-panel p-10 rounded-[2rem] space-y-8 shadow-2xl">
                <div class="space-y-4">
                    <h2 class="text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Panel Administrativo <br/>
                        <span class="text-primary-container">PROMUBE</span>
                    </h2>
                    <div class="h-1.5 w-24 bg-tertiary-fixed mx-auto rounded-full"></div>
                </div>
                <div class="space-y-6">
                    <blockquote class="text-xl lg:text-2xl font-light text-white/90 italic leading-relaxed">
                        "La educación no es la preparación para la vida; la educación es la vida misma."
                    </blockquote>
                    <div class="flex items-center justify-center space-x-3">
                        <span class="h-px w-8 bg-white/30"></span>
                        <cite class="text-sm font-bold tracking-widest uppercase text-white/70 not-italic">John Dewey</cite>
                        <span class="h-px w-8 bg-white/30"></span>
                    </div>
                </div>
            </div>
            <!-- Subtle Decorative Elements -->
            <div class="flex justify-center space-x-12 opacity-50">
                <div class="flex flex-col items-center">
                    <span class="text-4xl font-bold text-white">15k+</span>
                    <span class="text-[10px] uppercase font-black tracking-widest text-white/60">Becas Activas</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-4xl font-bold text-white">98%</span>
                    <span class="text-[10px] uppercase font-black tracking-widest text-white/60">Eficiencia</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-4xl font-bold text-white">24/7</span>
                    <span class="text-[10px] uppercase font-black tracking-widest text-white/60">Monitoreo</span>
                </div>
            </div>
        </div>
        <!-- Absolute Bottom Corner -->
        <div class="absolute bottom-8 right-12 flex items-center space-x-4">
            <img alt="Government Logo" class="h-10 w-10 object-cover rounded-full border-2 border-white/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqXimkkna5Gcqh0bEfJ1qVZB3JnfTVLyZ_lwow_VH41AphP5spYzN5RiuUifGBSlPaKt7loDYdpwe29Otv5zgjHRmtoXT6yzDqY4r4RUvsmiaA-hgC7nVJNjPAd550l90SZpVxiK9_2xzo5B34YJYvH-iXz7Ghlxoq6cauACVWavzrYjHj4S8NDr0IUEjPcjZAGaajtgRtqKovHisCmpxOvx0F1LeQ6FtnWOH6XaCf_GupuSG-tSMDXVS76-Np3_M1QzvQrFcx-lQ"/>
            <span class="text-white/60 text-[10px] font-bold tracking-tighter uppercase">Ministerio de Educación • © 2024</span>
        </div>
    </section>
</main>
</body>
</html>
