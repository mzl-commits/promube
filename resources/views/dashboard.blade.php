<x-layouts.app :title="__('Dashboard | PROMUBE')">
    <!-- Welcome Section -->
    <section>
        <h2 class="text-4xl font-extrabold text-on-surface tracking-tight mb-2">Resumen Operativo</h2>
        <p class="text-on-surface-variant text-lg">Monitoreo en tiempo real del programa de becas.</p>
    </section>

    <!-- Summary Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1: Active Scholarships -->
        <div class="glass-card p-6 rounded-full border-none shadow-sm flex flex-col justify-between group hover:shadow-xl transition-all duration-300 relative overflow-hidden h-48">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-colors"></div>
            <div class="flex justify-between items-start">
                <div class="w-12 h-12 rounded-xl bg-primary-container flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined" data-icon="school">school</span>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-primary bg-primary-fixed px-2 py-1 rounded-full">Activo</span>
            </div>
            <div>
                <p class="text-on-surface-variant text-sm font-medium mb-1">Total de Becas Activas</p>
                <h3 class="text-3xl font-black text-on-surface">12</h3>
            </div>
        </div>

        <!-- Card 2: New Beneficiaries -->
        <div class="glass-card p-6 rounded-full border-none shadow-sm flex flex-col justify-between group hover:shadow-xl transition-all duration-300 relative overflow-hidden h-48">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-tertiary/5 rounded-full blur-2xl group-hover:bg-tertiary/10 transition-colors"></div>
            <div class="flex justify-between items-start">
                <div class="w-12 h-12 rounded-xl bg-tertiary-container/20 flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined" data-icon="group">group</span>
                </div>
                <span class="flex items-center gap-1 text-[10px] font-bold text-success text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> +12%
                </span>
            </div>
            <div>
                <p class="text-on-surface-variant text-sm font-medium mb-1">Nuevos Beneficiados</p>
                <h3 class="text-3xl font-black text-on-surface">340</h3>
            </div>
        </div>

        <!-- Card 3: Locations -->
        <div class="glass-card p-6 rounded-full border-none shadow-sm flex flex-col justify-between group hover:shadow-xl transition-all duration-300 relative overflow-hidden h-48">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-slate-400/5 rounded-full blur-2xl group-hover:bg-slate-400/10 transition-colors"></div>
            <div class="flex justify-between items-start">
                <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container">
                    <span class="material-symbols-outlined" data-icon="location_on">location_on</span>
                </div>
            </div>
            <div>
                <p class="text-on-surface-variant text-sm font-medium mb-1">Sedes</p>
                <h3 class="text-3xl font-black text-on-surface">5</h3>
            </div>
        </div>
    </div>

    <!-- Accesos Rápidos Section -->
    <section class="space-y-6">
        <div class="flex items-center gap-3">
            <div class="w-1.5 h-6 bg-tertiary rounded-full"></div>
            <h3 class="text-2xl font-bold text-on-surface">Accesos Rápidos</h3>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Giant Manager Button -->
            <a href="{{ route('admin.becas') }}" class="relative group block w-full text-left overflow-hidden rounded-[2rem] p-8 bg-gradient-to-br from-primary to-primary-dim shadow-lg active:scale-[0.98] transition-all duration-300 h-64">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-on-primary">
                        <span class="material-symbols-outlined text-3xl" data-icon="auto_awesome">auto_awesome</span>
                    </div>
                    <div>
                        <h4 class="text-white text-3xl font-black tracking-tight mb-2">Ir al gestor de Becas</h4>
                        <p class="text-primary-fixed-dim/80 font-medium max-w-xs">Administra convocatorias, revisa solicitudes y aprueba nuevos perfiles en un solo lugar.</p>
                    </div>
                </div>
                <div class="absolute bottom-8 right-8 w-12 h-12 bg-white rounded-full flex items-center justify-center text-primary shadow-xl group-hover:translate-x-2 transition-transform">
                    <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                </div>
            </a>

            <!-- Secondary Quick Actions -->
            <div class="grid grid-cols-2 gap-6">
                <a class="bg-surface-container-low hover:bg-surface-container-high rounded-full p-6 transition-all group border border-outline-variant/10" href="{{ route('admin.becas') }}">
                    <div class="w-10 h-10 bg-white dark:bg-slate-900 rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:text-primary transition-colors">
                        <span class="material-symbols-outlined" data-icon="add_circle">add_circle</span>
                    </div>
                    <h5 class="font-bold text-on-surface">Nueva Convocatoria</h5>
                    <p class="text-[11px] text-on-surface-variant mt-1 uppercase tracking-wider">Crear anuncio</p>
                </a>
                
                <a class="bg-surface-container-low hover:bg-surface-container-high rounded-full p-6 transition-all group border border-outline-variant/10" href="#">
                    <div class="w-10 h-10 bg-white dark:bg-slate-900 rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:text-tertiary transition-colors">
                        <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                    </div>
                    <h5 class="font-bold text-on-surface">Reporte Mensual</h5>
                    <p class="text-[11px] text-on-surface-variant mt-1 uppercase tracking-wider">Descargar PDF</p>
                </a>
                
                <a class="bg-surface-container-low hover:bg-surface-container-high rounded-full p-6 transition-all group border border-outline-variant/10" href="#">
                    <div class="w-10 h-10 bg-white dark:bg-slate-900 rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:text-indigo-500 transition-colors">
                        <span class="material-symbols-outlined" data-icon="mail">mail</span>
                    </div>
                    <h5 class="font-bold text-on-surface">Comunicados</h5>
                    <p class="text-[11px] text-on-surface-variant mt-1 uppercase tracking-wider">Bandeja de entrada</p>
                </a>
                
                <a class="bg-surface-container-low hover:bg-surface-container-high rounded-full p-6 transition-all group border border-outline-variant/10" href="#">
                    <div class="w-10 h-10 bg-white dark:bg-slate-900 rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:text-secondary transition-colors">
                        <span class="material-symbols-outlined" data-icon="history">history</span>
                    </div>
                    <h5 class="font-bold text-on-surface">Historial Logs</h5>
                    <p class="text-[11px] text-on-surface-variant mt-1 uppercase tracking-wider">Auditoría</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Activity (Editorial Style) -->
    <section class="space-y-6 pb-12">
        <div class="flex justify-between items-end">
            <h3 class="text-2xl font-bold text-on-surface">Actividad Reciente</h3>
            <a class="text-primary text-sm font-semibold hover:underline" href="#">Ver todo el registro</a>
        </div>
        
        <div class="space-y-4">
            <!-- Row 1 -->
            <div class="flex items-center gap-6 p-4 rounded-full hover:bg-surface-container-highest transition-colors">
                <div class="w-2 h-2 rounded-full bg-tertiary"></div>
                <div class="flex-1">
                    <p class="text-on-surface font-semibold">Nueva solicitud de beca recibida</p>
                    <p class="text-xs text-on-surface-variant">Juan Pérez ha postulado para la Sede Central</p>
                </div>
                <span class="text-xs font-mono text-outline">12:45 PM</span>
            </div>
            
            <!-- Row 2 -->
            <div class="flex items-center gap-6 p-4 rounded-full hover:bg-surface-container-highest transition-colors">
                <div class="w-2 h-2 rounded-full bg-primary"></div>
                <div class="flex-1">
                    <p class="text-on-surface font-semibold">Actualización de Sistema</p>
                    <p class="text-xs text-on-surface-variant">Se habilitó el módulo de 'Reportes Predictivos'</p>
                </div>
                <span class="text-xs font-mono text-outline">09:12 AM</span>
            </div>
            
            <!-- Row 3 -->
            <div class="flex items-center gap-6 p-4 rounded-full hover:bg-surface-container-highest transition-colors">
                <div class="w-2 h-2 rounded-full bg-outline-variant"></div>
                <div class="flex-1">
                    <p class="text-on-surface font-semibold">Cierre de Convocatoria Anual</p>
                    <p class="text-xs text-on-surface-variant">La convocatoria 2024-II ha finalizado oficialmente</p>
                </div>
                <span class="text-xs font-mono text-outline">Ayer</span>
            </div>
        </div>
    </section>
</x-layouts.app>
