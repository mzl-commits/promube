<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'PROMUBE | Administrative Dashboard' }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
          tailwind.config = {
            darkMode: "class",
            theme: {
              extend: {
                colors: {
                  "on-primary-fixed": "#2a13c5",
                  "on-error": "#fff7f7",
                  "secondary-fixed-dim": "#d6d3d7",
                  "outline-variant": "#b2b1bb",
                  "inverse-primary": "#8582ff",
                  "error-dim": "#4f0116",
                  "on-secondary": "#fbf8fc",
                  "surface-dim": "#dad9e5",
                  "surface-container-lowest": "#ffffff",
                  "surface-container-highest": "#e3e1ec",
                  "on-surface-variant": "#5e5e67",
                  "inverse-surface": "#0e0e11",
                  "primary-dim": "#4034d7",
                  "on-tertiary": "#fff6ff",
                  "secondary": "#5f5e62",
                  "outline": "#7a7a83",
                  "on-tertiary-fixed": "#000000",
                  "on-tertiary-fixed-variant": "#16002c",
                  "on-tertiary-container": "#000000",
                  "tertiary-fixed": "#af5cfe",
                  "on-secondary-fixed-variant": "#5c5b5e",
                  "on-primary": "#faf6ff",
                  "error-container": "#ff8b9a",
                  "error": "#9e3f4e",
                  "tertiary-fixed-dim": "#a14ef0",
                  "surface-tint": "#4d44e3",
                  "tertiary-container": "#af5cfe",
                  "on-secondary-container": "#525155",
                  "background": "#fbf8fc",
                  "tertiary-dim": "#7717c6",
                  "surface-container-low": "#f5f2f8",
                  "tertiary": "#842cd3",
                  "secondary-fixed": "#e4e1e6",
                  "primary-fixed-dim": "#d2d0ff",
                  "surface": "#fbf8fc",
                  "primary-container": "#e2dfff",
                  "secondary-container": "#e4e1e6",
                  "surface-variant": "#e3e1ec",
                  "inverse-on-surface": "#9e9ca0",
                  "surface-container": "#efedf4",
                  "on-surface": "#31323a",
                  "on-secondary-fixed": "#3f3f42",
                  "secondary-dim": "#535356",
                  "on-primary-container": "#3f33d6",
                  "surface-bright": "#fbf8fc",
                  "primary": "#4d44e3",
                  "on-error-container": "#782232",
                  "primary-fixed": "#e2dfff",
                  "on-background": "#31323a",
                  "on-primary-fixed-variant": "#4a40e0",
                  "surface-container-high": "#e9e7f0"
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
            body { font-family: 'Inter', sans-serif; }
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
            .dark .glass-card {
                background: rgba(15, 23, 42, 0.6);
            }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen">
    <!-- SideNavBar -->
    <aside class="fixed left-0 h-full w-64 z-50 bg-slate-50 dark:bg-slate-950 flex flex-col gap-y-2 p-4 tonal-shift border-r-0 font-sans text-sm font-medium">
        <div class="flex items-center gap-3 px-2 mb-8">
            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-on-primary">
                <span class="material-symbols-outlined" data-icon="school">school</span>
            </div>
            <div>
                <h1 class="text-lg font-black text-indigo-700 dark:text-indigo-300 leading-none">PROMUBE</h1>
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant opacity-70">Management Portal</p>
            </div>
        </div>
        
        <nav class="flex-1 space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-white dark:bg-slate-900 text-indigo-600 dark:text-indigo-400 shadow-sm font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }} rounded-xl transition-all active:translate-x-1 duration-150">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.becas') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.becas') ? 'bg-white dark:bg-slate-900 text-indigo-600 dark:text-indigo-400 shadow-sm font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }} rounded-xl transition-all active:translate-x-1 duration-150">
                <span class="material-symbols-outlined" data-icon="school">school</span>
                <span>Scholarships</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:translate-x-1 duration-150">
                <span class="material-symbols-outlined" data-icon="group">group</span>
                <span>Beneficiaries</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:translate-x-1 duration-150">
                <span class="material-symbols-outlined" data-icon="location_on">location_on</span>
                <span>Locations</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800/50 rounded-xl transition-all active:translate-x-1 duration-150">
                <span class="material-symbols-outlined" data-icon="newspaper">newspaper</span>
                <span>News</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.edit') ? 'bg-white dark:bg-slate-900 text-indigo-600 dark:text-indigo-400 shadow-sm font-bold' : 'text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800/50' }} rounded-xl transition-all active:translate-x-1 duration-150">
                <span class="material-symbols-outlined" data-icon="settings_accessibility">settings_accessibility</span>
                <span>Settings</span>
            </a>
        </nav>
        
        <div class="mt-auto pt-4 border-t border-outline-variant/10 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 rounded-xl transition-all">
                <span class="material-symbols-outlined" data-icon="help">help</span>
                <span>Help Center</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-error hover:bg-error-container/10 rounded-xl transition-all cursor-pointer">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ml-64 min-h-screen">
        <!-- TopAppBar -->
        <header class="fixed top-0 right-0 left-64 z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl flex justify-between items-center px-8 h-16 shadow-sm dark:shadow-none tonal-shift bg-slate-50 dark:bg-slate-800/50">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-sm" data-icon="search">search</span>
                    <input class="w-full bg-surface-container-low border-none rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/20 placeholder:text-outline/60" placeholder="Search data, beneficiaries, reports..." type="text"/>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-500 hover:bg-slate-100/50 dark:hover:bg-slate-800/50 transition-colors rounded-full relative">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-tertiary rounded-full"></span>
                </button>
                <div class="h-8 w-[1px] bg-outline-variant/20 mx-2"></div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-on-surface leading-none">{{ auth()->check() ? auth()->user()->name : 'Admin User' }}</p>
                        <p class="text-[10px] text-on-surface-variant font-medium">{{ auth()->check() ? auth()->user()->email : 'Administrator Profile' }}</p>
                    </div>
                    <div class="w-9 h-9 rounded-full bg-primary-container text-primary flex items-center justify-center font-bold text-sm border-2 border-primary-container">
                        {{ auth()->check() ? substr(auth()->user()->name, 0, 1) : 'A' }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Dynamic Page Content -->
        <div class="pt-24 p-8 max-w-7xl mx-auto space-y-12">
            {{ $slot }}
        </div>
    </main>

    <script src="{{ url('vendor/livewire/livewire.js') }}?id={{ md5(Livewire\Volt\Volt::class) }}"
        data-csrf="{{ csrf_token() }}"
        data-update-uri="{{ url('livewire/update') }}"
        data-navigate-once="true">
    </script>
</body>
</html>
