<?php

use Livewire\Volt\Component;
use App\Models\Beca;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads;

    public $nombre = '';
    public $titulo = '';
    public $slug = '';
    public $subtitulo = '';
    public $descripcion = '';
    
    // File fields
    public $imagen_portada;
    public $banner;

    // JSON Arrays
    // beneficios: [['icon' => 'material-icon-name or path', 'icon_mode' => 'text|image', 'icon_preview' => 'temp-url', 'titulo' => '...', 'descripcion' => '...']]
    public $beneficios = [];
    public $beneficioIconFiles = []; // separate array for file uploads (Livewire limitation)
    // pasos: [['titulo' => '...', 'descripcion' => '...']]
    public $pasos = [];

    public function layout()
    {
        return 'components.layouts.app';
    }

    public function title()
    {
        return 'Nueva Beca Educativa';
    }

    // Dynamic Arrays Logic
    public function addBeneficio()
    {
        $this->beneficios[] = [
            'icon'         => '',
            'icon_mode'    => 'text',   // 'text' | 'image'
            'icon_preview' => '',
            'titulo'       => '',
            'descripcion'  => '',
        ];
    }

    public function removeBeneficio($index)
    {
        unset($this->beneficios[$index]);
        $this->beneficios = array_values($this->beneficios);
        // Also reset the file slot
        unset($this->beneficioIconFiles[$index]);
        $this->beneficioIconFiles = array_values($this->beneficioIconFiles);
    }

    public function setBeneficioIconMode($index, $mode)
    {
        $this->beneficios[$index]['icon_mode'] = $mode;
        // Clear the other mode data
        if ($mode === 'text') {
            $this->beneficioIconFiles[$index] = null;
            $this->beneficios[$index]['icon_preview'] = '';
        } else {
            $this->beneficios[$index]['icon'] = '';
        }
    }

    // Called automatically when beneficioIconFiles.N changes
    public function updatedBeneficioIconFiles($value, $key)
    {
        $index = (int) $key;
        if (isset($this->beneficioIconFiles[$index]) && $this->beneficioIconFiles[$index]) {
            $this->beneficios[$index]['icon_preview'] = $this->beneficioIconFiles[$index]->temporaryUrl();
        }
    }

    public function addPaso()
    {
        $this->pasos[] = ['titulo' => '', 'descripcion' => ''];
    }

    public function removePaso($index)
    {
        unset($this->pasos[$index]);
        $this->pasos = array_values($this->pasos);
    }

    // Live slug generation like before
    public function updatedNombre($value)
    {
        $this->slug = Str::slug($value);
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:becas,slug',
            'descripcion' => 'nullable|string',
            'imagen_portada' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:2048',
        ]);

        $data = [
            'nombre' => $this->nombre,
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'subtitulo' => $this->subtitulo ?? '',
            'descripcion' => $this->descripcion,
        ];

        if ($this->imagen_portada) {
            $data['imagen_portada'] = $this->imagen_portada->store('becas/portadas', 'public');
        }

        if ($this->banner) {
            $data['banner'] = $this->banner->store('becas/banners', 'public');
        }

        // Handle Beneficios
        $formattedBeneficios = [];
        foreach ($this->beneficios as $index => $beneficio) {
            $mode = $beneficio['icon_mode'] ?? 'text';
            $iconPath = '';

            if ($mode === 'image' && isset($this->beneficioIconFiles[$index]) && $this->beneficioIconFiles[$index]) {
                // Upload the image file
                $iconPath = $this->beneficioIconFiles[$index]->store('becas/iconos', 'public');
            } else {
                // Use the text icon name (Material Symbol)
                $iconPath = $beneficio['icon'] ?? '';
            }

            $formattedBeneficios[] = [
                'icon'        => $iconPath,
                'icon_mode'   => $mode,
                'titulo'      => $beneficio['titulo'] ?? '',
                'descripcion' => $beneficio['descripcion'] ?? '',
            ];
        }
        $data['beneficios'] = $formattedBeneficios;
        
        // Handle Pasos
        $formattedPasos = [];
        foreach ($this->pasos as $index => $paso) {
            $formattedPasos[] = [
                'titulo' => $paso['titulo'] ?? '',
                'descripcion' => $paso['descripcion'] ?? '',
            ];
        }
        $data['pasos'] = $formattedPasos;

        Beca::create($data);

        return redirect()->route('admin.becas');
    }

    public function cancel()
    {
        return redirect()->route('admin.becas');
    }
}; ?>

<div>
    <div class="pb-32 min-h-screen">
    <style>
      .glass-nav { backdrop-filter: blur(16px); }
      .dashed-border { background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='12' ry='12' stroke='%234D44E3FF' stroke-width='2' stroke-dasharray='8%2c 12' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e"); border-radius: 12px; }
    </style>

    <!-- Hero Header -->
    <div class="mb-12 flex justify-between items-end pb-4 border-b border-outline-variant/10">
        <div>
            <nav class="flex gap-2 text-xs font-semibold text-on-surface-variant mb-4 uppercase tracking-widest">
                <span>Admin</span>
                <span>/</span>
                <a href="{{ route('admin.becas') }}" wire:navigate class="hover:text-primary transition-colors">Gestión de Becas</a>
                <span>/</span>
                <span class="text-primary">Nueva Beca</span>
            </nav>
            <h2 class="text-4xl font-extrabold tracking-tight text-on-surface leading-none">Nueva Beca Educativa</h2>
            <p class="text-on-surface-variant mt-2 max-w-xl">Crea una nueva oportunidad académica definiendo los requisitos, beneficios y el flujo de aplicación para los estudiantes.</p>
        </div>
        <div class="flex gap-4">
            <button wire:click="cancel" class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface font-semibold hover:bg-surface-container-high transition-all">Descartar</button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-8 items-start">
        <!-- Column: Main Form Data -->
        <div class="col-span-12 lg:col-span-8 space-y-8">
            
            <!-- Card 1: Datos Principales -->
            <section class="bg-surface-container-lowest rounded-xl p-8 shadow-[0px_12px_32px_rgba(49,50,58,0.06)] border border-slate-100">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" data-icon="description">description</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Datos Principales</h3>
                        <p class="text-sm text-on-surface-variant">Información de identidad de la convocatoria</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2 space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1">Nombre de la Beca</label>
                        <input wire:model.live.debounce.500ms="nombre" type="text" placeholder="Ej: Beca Excelencia Académica 2024" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary/20 transition-all">
                        @error('nombre') <span class="text-xs text-error font-semibold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1">Título Corto</label>
                        <input wire:model="titulo" type="text" placeholder="Ej: Excelencia 2024" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary/20 transition-all">
                        @error('titulo') <span class="text-xs text-error font-semibold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1">Slug (URL)</label>
                        <div class="flex items-center bg-surface-container-low rounded-xl px-4 py-3">
                            <span class="text-on-surface-variant text-sm mr-1">promube.gob.mx/becas/</span>
                            <input wire:model="slug" type="text" placeholder="excelencia-2024" class="bg-transparent border-none focus:ring-0 text-sm p-0 w-full font-medium">
                        </div>
                        @error('slug') <span class="text-xs text-error font-semibold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="col-span-2 space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1">Descripción de la Convocatoria</label>
                        <textarea wire:model="descripcion" rows="4" placeholder="Describe los objetivos y alcance de esta beca..." class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary/20 transition-all"></textarea>
                    </div>
                </div>
            </section>

            <!-- Card 2: Beneficios y Pasos -->
            <section class="bg-surface-container-lowest rounded-xl p-8 shadow-[0px_12px_32px_rgba(49,50,58,0.06)] border border-slate-100">
                <!-- Beneficios Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-tertiary-container/20 flex items-center justify-center text-tertiary">
                            <span class="material-symbols-outlined" data-icon="stars">stars</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Beneficios del Programa</h3>
                            <p class="text-sm text-on-surface-variant">Agrega lo que el estudiante recibirá</p>
                        </div>
                    </div>
                    <button type="button" wire:click="addBeneficio" class="flex items-center gap-2 text-primary font-bold text-sm bg-primary-container px-4 py-2 rounded-full hover:bg-primary hover:text-white transition-all">
                        <span class="material-symbols-outlined text-sm" data-icon="add">add</span>
                        Añadir Beneficio
                    </button>
                </div>
                
                <div class="space-y-4">
                    @forelse($beneficios as $index => $beneficio)
                    <div wire:key="beneficio-{{ $index }}" class="bg-surface-container-low rounded-xl border border-transparent hover:border-primary-container transition-all overflow-hidden">
                        {{-- Header row: number + title + description + delete --}}
                        <div class="group flex items-center gap-4 p-4">
                            <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center text-xs font-bold shadow-sm shrink-0 text-on-surface-variant">{{ $index + 1 }}</div>
                            <input wire:model="beneficios.{{ $index }}.titulo" type="text" placeholder="Nombre (Ej: Apoyo mensual)" class="bg-transparent border-none focus:ring-0 text-sm font-bold w-1/3 min-w-0">
                            <input wire:model="beneficios.{{ $index }}.descripcion" type="text" placeholder="Descripción breve..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm font-medium min-w-0">
                            <button type="button" wire:click="removeBeneficio({{ $index }})" class="opacity-0 group-hover:opacity-100 p-2 text-error hover:bg-error-container/20 rounded-full transition-all shrink-0">
                                <span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
                            </button>
                        </div>
                        {{-- Icon row --}}
                        <div class="flex items-stretch gap-0 border-t border-outline-variant/10">
                            {{-- Toggle buttons --}}
                            <div class="flex flex-col shrink-0">
                                <button type="button"
                                    wire:click="setBeneficioIconMode({{ $index }}, 'text')"
                                    class="flex-1 px-3 flex items-center gap-1.5 text-[11px] font-bold tracking-wider transition-all {{ ($beneficio['icon_mode'] ?? 'text') === 'text' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }}"
                                    title="Icono por texto (Material Symbols)">
                                    <span class="material-symbols-outlined text-base" style="font-size:16px">text_fields</span>
                                    Texto
                                </button>
                                <button type="button"
                                    wire:click="setBeneficioIconMode({{ $index }}, 'image')"
                                    class="flex-1 px-3 flex items-center gap-1.5 text-[11px] font-bold tracking-wider transition-all border-t border-outline-variant/10 {{ ($beneficio['icon_mode'] ?? 'text') === 'image' ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }}"
                                    title="Icono por imagen">
                                    <span class="material-symbols-outlined text-base" style="font-size:16px">image</span>
                                    Imagen
                                </button>
                            </div>

                            {{-- Icon content area --}}
                            <div class="flex-1 flex items-center px-4 py-3 border-l border-outline-variant/10">
                                @if(($beneficio['icon_mode'] ?? 'text') === 'text')
                                    {{-- Text icon input --}}
                                    <div class="flex items-center gap-3 w-full">
                                        {{-- Preview --}}
                                        <div class="w-9 h-9 rounded-lg bg-primary-container flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined text-primary" style="font-size:20px">{{ $beneficio['icon'] ?: 'star' }}</span>
                                        </div>
                                        <input wire:model.live="beneficios.{{ $index }}.icon"
                                            type="text"
                                            placeholder="Nombre del icono (Ej: star, school, payments...)"
                                            class="flex-1 bg-transparent border-none focus:ring-0 text-sm font-mono text-primary">
                                        <a href="https://fonts.google.com/icons" target="_blank"
                                            class="text-[11px] text-on-surface-variant hover:text-primary shrink-0 transition-colors font-semibold underline underline-offset-2">
                                            Ver iconos
                                        </a>
                                    </div>
                                @else
                                    {{-- Image upload --}}
                                    <div class="flex items-center gap-3 w-full">
                                        @if(!empty($beneficio['icon_preview']))
                                            <img src="{{ $beneficio['icon_preview'] }}" class="w-9 h-9 rounded-lg object-cover shrink-0 border border-outline-variant/20">
                                        @else
                                            <div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center shrink-0">
                                                <span class="material-symbols-outlined text-outline" style="font-size:20px">image</span>
                                            </div>
                                        @endif
                                        <label class="flex-1 cursor-pointer">
                                            <span class="text-sm font-semibold text-primary hover:text-primary-dim transition-colors">
                                                {{ !empty($beneficio['icon_preview']) ? 'Cambiar imagen' : 'Seleccionar imagen del icono' }}
                                            </span>
                                            <span class="block text-[11px] text-on-surface-variant mt-0.5">PNG, SVG, JPG — máx. 512KB</span>
                                            <input type="file"
                                                wire:model="beneficioIconFiles.{{ $index }}"
                                                accept="image/png,image/jpeg,image/svg+xml,image/webp"
                                                class="hidden">
                                        </label>
                                        <div wire:loading wire:target="beneficioIconFiles.{{ $index }}" class="text-xs text-primary font-bold shrink-0">Cargando...</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-6 text-center text-sm font-medium text-on-surface-variant rounded-xl bg-surface-container-low">
                        Haz clic en "Añadir Beneficio" para comenzar.
                    </div>
                    @endforelse
                </div>

                <!-- Pasos Header -->
                <div class="mt-12 flex items-center justify-between mb-8 pt-8 border-t border-slate-100">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined" data-icon="list_alt">list_alt</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Pasos del Proceso</h3>
                            <p class="text-sm text-on-surface-variant">Define la ruta que debe seguir el aplicante</p>
                        </div>
                    </div>
                    <button type="button" wire:click="addPaso" class="flex items-center gap-2 text-secondary font-bold text-sm bg-secondary-container px-4 py-2 rounded-full hover:bg-secondary hover:text-white transition-all">
                        <span class="material-symbols-outlined text-sm" data-icon="add">add</span>
                        Añadir Paso
                    </button>
                </div>
                
                <div class="space-y-4">
                    @forelse($pasos as $index => $paso)
                    <div wire:key="paso-{{ $index }}" class="group flex items-center gap-4 bg-surface-container-low p-4 rounded-xl border border-transparent hover:border-secondary-container transition-all">
                        <span class="material-symbols-outlined text-secondary shrink-0 cursor-move" data-icon="drag_indicator">drag_indicator</span>
                        <div class="flex-1 space-y-1">
                            <input wire:model="pasos.{{ $index }}.titulo" type="text" placeholder="Nombre del paso (Ej: Registro Inicial)" class="w-full bg-transparent border-none focus:ring-0 text-sm font-bold p-0">
                            <input wire:model="pasos.{{ $index }}.descripcion" type="text" placeholder="Descripción de los requerimientos de este paso..." class="w-full bg-transparent border-none focus:ring-0 text-xs text-on-surface-variant p-0 mt-1">
                        </div>
                        <button type="button" wire:click="removePaso({{ $index }})" class="opacity-0 group-hover:opacity-100 p-2 text-error hover:bg-error-container/20 rounded-full transition-all shrink-0">
                            <span class="material-symbols-outlined" data-icon="remove_circle">remove_circle</span>
                        </button>
                    </div>
                    @empty
                    <div class="p-4 text-center text-sm font-medium text-on-surface-variant">
                        Añade pasos para ilustrar el proceso de postulación a los aspirantes.
                    </div>
                    @endforelse
                </div>
            </section>
        </div>
        
        <!-- Column: Media and Config -->
        <div class="col-span-12 lg:col-span-4 space-y-8">
            
            <!-- Card 3: Archivos Multimedia -->
            <section class="bg-surface-container-lowest rounded-xl p-8 shadow-[0px_12px_32px_rgba(49,50,58,0.06)] border border-slate-100">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-on-surface">
                        <span class="material-symbols-outlined" data-icon="image">image</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Multimedia</h3>
                        <p class="text-sm text-on-surface-variant">Imagen y visuales del portal</p>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <!-- Imagen de Portada Upload -->
                    <div class="space-y-2 relative">
                        <label class="text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1">Imagen de Portada (4:3)</label>
                        <div class="relative overflow-hidden dashed-border aspect-video flex flex-col items-center justify-center p-6 text-center group cursor-pointer hover:bg-primary-container/10 transition-colors">
                            @if ($imagen_portada)
                                <img src="{{ $imagen_portada->temporaryUrl() }}" class="absolute inset-0 w-full h-full object-cover">
                            @endif
                            <input type="file" wire:model="imagen_portada" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            
                            <div class="relative z-0 pointer-events-none {{ $imagen_portada ? 'opacity-0' : 'opacity-100' }}">
                                <span class="material-symbols-outlined text-primary text-4xl mb-2" data-icon="cloud_upload">cloud_upload</span>
                                <p class="text-xs font-bold text-primary">Haz clic para subir portada</p>
                                <p class="text-[10px] text-on-surface-variant mt-1 leading-relaxed">PNG o JPG hasta 2MB.<br/>Mínimo 800x600px</p>
                            </div>
                        </div>
                        <div wire:loading wire:target="imagen_portada" class="text-xs text-primary font-bold mt-1">Cargando...</div>
                        @error('imagen_portada') <span class="text-xs text-error font-semibold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <!-- Banner Upload -->
                    <div class="space-y-2 relative">
                        <label class="text-xs font-bold uppercase tracking-wider text-on-surface-variant px-1">Banner Principal (Hero)</label>
                        <div class="relative overflow-hidden dashed-border h-32 flex items-center justify-center p-4 text-center group cursor-pointer hover:bg-primary-container/10 transition-colors">
                            @if ($banner)
                                <img src="{{ $banner->temporaryUrl() }}" class="absolute inset-0 w-full h-full object-cover">
                            @endif
                            <input type="file" wire:model="banner" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            
                            <div class="relative z-0 pointer-events-none flex items-center gap-3 {{ $banner ? 'opacity-0' : 'opacity-100' }}">
                                <span class="material-symbols-outlined text-primary" data-icon="wallpaper">wallpaper</span>
                                <span class="text-xs font-bold text-primary">Seleccionar banner horizontal</span>
                            </div>
                        </div>
                        <div wire:loading wire:target="banner" class="text-xs text-primary font-bold mt-1">Cargando...</div>
                        @error('banner') <span class="text-xs text-error font-semibold mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </section>
            
        </div>
    </div>
</div>

<!-- Fixed Footer Actions -->
<footer class="fixed bottom-0 right-0 w-full lg:w-[calc(100%-16rem)] h-20 glass-nav bg-white/90 border-t border-outline-variant/20 z-50 flex items-center justify-between px-6 lg:px-12">
    <div class="hidden md:flex items-center gap-4 text-xs font-medium text-on-surface-variant">
        <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-error"></span> Borrador sin guardar</span>
        <span class="text-outline-variant">|</span>
        <span>Creando Nueva Convocatoria</span>
    </div>
    <div class="flex items-center gap-4 ml-auto">
        <button wire:click="cancel" class="px-6 py-3 text-sm font-bold text-secondary hover:text-on-surface transition-colors">
            Cancelar
        </button>
        <button wire:click="store" class="px-8 py-3 bg-primary text-on-primary rounded-xl font-bold shadow-xl shadow-primary/30 hover:bg-primary-dim hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-lg" data-icon="save">save</span>
            Guardar y Crear Beca
        </button>
    </div>
</footer>
</div>
