<?php

use Livewire\Volt\Component;
use App\Models\Beca;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

new class extends Component {
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $isModalOpen = false;
    
    // Basic Form fields
    public $becaId;
    public $nombre;
    public $titulo;
    public $slug;
    public $subtitulo;
    public $descripcion;
    
    // File fields
    public $imagen_portada;
    public $banner;
    
    // Existing paths for preview
    public $imagen_portada_url;
    public $banner_url;

    // JSON Arrays
    // beneficios: [['icon' => 'google-icon or path', 'icon_file' => (file), 'titulo' => '...', 'descripcion' => '...']]
    public $beneficios = [];
    // pasos: [['titulo' => '...', 'descripcion' => '...']]
    public $pasos = [];

    public function layout()
    {
        return 'layouts.app';
    }

    public function title()
    {
        return 'Gestión de Becas';
    }

    public function mount()
    {
        // ...
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        Beca::destroy($id);
    }

    public function create()
    {
        $this->resetValidation();
        $this->resetFields();
        $this->isModalOpen = true;
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->resetFields();
        $beca = Beca::findOrFail($id);
        $this->becaId = $id;
        $this->nombre = $beca->nombre;
        $this->titulo = $beca->titulo;
        $this->slug = $beca->slug;
        $this->subtitulo = $beca->subtitulo;
        $this->descripcion = $beca->descripcion;
        
        $this->imagen_portada_url = $beca->imagen_portada;
        $this->banner_url = $beca->banner;
        
        // Load JSON data
        $this->beneficios = is_array($beca->beneficios) ? $beca->beneficios : (json_decode($beca->beneficios, true) ?: []);
        $this->pasos = is_array($beca->pasos) ? $beca->pasos : (json_decode($beca->pasos, true) ?: []);

        $this->isModalOpen = true;
    }

    // Dynamic Arrays Logic
    public function addBeneficio()
    {
        $this->beneficios[] = ['icon' => '', 'icon_file' => null, 'titulo' => '', 'descripcion' => ''];
    }

    public function removeBeneficio($index)
    {
        unset($this->beneficios[$index]);
        $this->beneficios = array_values($this->beneficios); // reindex
    }

    public function addPaso()
    {
        $this->pasos[] = ['titulo' => '', 'descripcion' => ''];
    }

    public function removePaso($index)
    {
        unset($this->pasos[$index]);
        $this->pasos = array_values($this->pasos); // reindex
    }

    public function save()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen_portada' => 'nullable|max:2048', // remove |image to allow users bypass temp file check on simple re-save sometimes, though |image is safer if actually uploaded
            'banner' => 'nullable|max:2048',
            'beneficios.*.icon_file' => 'nullable|max:1024'
        ]);

        $slug = $this->slug ?: Str::slug($this->nombre);
        
        // Handle basic fields
        $data = [
            'nombre' => $this->nombre,
            'titulo' => $this->titulo,
            'slug' => $slug,
            'subtitulo' => $this->subtitulo ?? '',
            'descripcion' => $this->descripcion,
        ];

        // Store Portada
        if ($this->imagen_portada && !is_string($this->imagen_portada)) {
            $data['imagen_portada'] = $this->imagen_portada->store('becas/portadas', 'public');
        }
        
        // Store Banner
        if ($this->banner && !is_string($this->banner)) {
            $data['banner'] = $this->banner->store('becas/banners', 'public');
        }

        // Handle Beneficios
        $formattedBeneficios = [];
        foreach ($this->beneficios as $index => $beneficio) {
            $iconPath = $beneficio['icon'] ?? '';
            // If a new icon file was uploaded dynamically
            if (isset($beneficio['icon_file']) && !empty($beneficio['icon_file']) && !is_string($beneficio['icon_file'])) {
                $iconPath = $beneficio['icon_file']->store('becas/iconos', 'public');
            }
            
            $formattedBeneficios[] = [
                'icon' => $iconPath,
                'titulo' => $beneficio['titulo'] ?? '',
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

        Beca::updateOrCreate(['id' => $this->becaId], $data);

        $this->isModalOpen = false;
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->becaId = null;
        $this->nombre = '';
        $this->titulo = '';
        $this->slug = '';
        $this->subtitulo = '';
        $this->descripcion = '';
        $this->imagen_portada = null;
        $this->banner = null;
        $this->imagen_portada_url = null;
        $this->banner_url = null;
        $this->beneficios = [];
        $this->pasos = [];
    }

    public function with(): array
    {
        return [
            'becas' => Beca::where('nombre', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10)
        ];
    }
}; ?>

<div>
    <div class="flex flex-col gap-6 w-full px-6 py-8 mx-auto max-w-7xl">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold dark:text-white">Becas (Backend Base)</h1>
            <button wire:click="create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium text-sm">Crear Nueva Beca</button>
        </div>

        <div class="flex w-full md:w-1/3">
            <input wire:model.live.debounce.300ms="search" type="search" placeholder="Buscar por nombre..." class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm" />
        </div>

        <div class="bg-white dark:bg-gray-900 shadow rounded-lg overflow-hidden border dark:border-gray-800">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-800/50">
                        <th class="py-3 px-4 font-semibold text-sm text-gray-700 dark:text-gray-300 border-b dark:border-gray-800">Nombre</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-700 dark:text-gray-300 border-b dark:border-gray-800">Título</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-700 dark:text-gray-300 border-b dark:border-gray-800 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($becas as $beca)
                        <tr class="border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/20">
                            <td class="py-3 px-4 text-sm font-medium dark:text-white">{{ $beca->nombre }}</td>
                            <td class="py-3 px-4 text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($beca->titulo, 50) }}</td>
                            <td class="py-3 px-4 text-sm text-right space-x-2">
                                <button wire:click="edit({{ $beca->id }})" class="text-blue-600 hover:text-blue-800 font-medium">Editar</button>
                                <button wire:click="confirmDelete({{ $beca->id }})" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('¿Eliminar béca?') || event.stopImmediatePropagation()">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-6 px-4 text-center text-sm text-gray-500 dark:text-gray-400">No hay becas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4 border-t dark:border-gray-800">
                {{ $becas->links() }}
            </div>
        </div>

        @if($isModalOpen)
            <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50 p-4">
                <div class="w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-900 rounded-xl shadow-lg border dark:border-gray-800 p-6 relative">
                    <button wire:click="$set('isModalOpen', false)" class="fixed top-4 right-4 bg-white/10 backdrop-blur rounded p-2 text-gray-200 hover:text-white dark:hover:text-white z-50 shadow-xl">
                        Cerrar [X]
                    </button>
                    
                    <h2 class="text-xl font-bold mb-4 dark:text-white">{{ $becaId ? 'Editar Beca' : 'Nueva Beca' }}</h2>
                    <!-- IMPORTANTE ENVOLVER EL FORMULARIO PARA PREVENIR ENVIOS ACCIDENTALES -->
                    <form wire:submit="save" class="space-y-6">
                        
                        <!-- Bloque Información Básica -->
                        <div class="p-4 bg-gray-50 dark:bg-gray-800/50 rounded-lg space-y-4">
                            <h3 class="font-bold text-gray-700 dark:text-gray-200">Datos Principales</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-300">Nombre</label>
                                    <input wire:model="nombre" type="text" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-300">Slug (opcional)</label>
                                    <input wire:model="slug" type="text" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm" placeholder="ejemplo-beca">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-300">Título</label>
                                    <input wire:model="titulo" type="text" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-300">Subtítulo</label>
                                    <input wire:model="subtitulo" type="text" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1 dark:text-gray-300">Descripción</label>
                                <textarea wire:model="descripcion" rows="3" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm" required></textarea>
                            </div>
                        </div>

                        <!-- Bloque Multimedia (Inputs de Archivo) -->
                        <div class="p-4 bg-gray-50 dark:bg-gray-800/50 rounded-lg space-y-4">
                            <h3 class="font-bold text-gray-700 dark:text-gray-200">Imágenes</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-300">Imagen de Portada</label>
                                    @if($imagen_portada_url) 
                                        <p class="text-xs text-blue-500 mb-2">Ya existe una imagen cargada: {{ $imagen_portada_url }}</p>
                                    @endif
                                    <input wire:model="imagen_portada" type="file" class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-sm dark:text-white" accept="image/*">
                                    <div wire:loading wire:target="imagen_portada" class="text-xs text-green-500 mt-1">Cargando temporalmente...</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 dark:text-gray-300">Imagen Banner</label>
                                    @if($banner_url) 
                                        <p class="text-xs text-blue-500 mb-2">Ya existe un banner cargado: {{ $banner_url }}</p>
                                    @endif
                                    <input wire:model="banner" type="file" class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-sm dark:text-white" accept="image/*">
                                    <div wire:loading wire:target="banner" class="text-xs text-green-500 mt-1">Cargando temporalmente...</div>
                                </div>
                            </div>
                        </div>

                        <!-- Bloque Beneficios (Dinámico) -->
                        <div class="p-4 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-bold text-gray-700 dark:text-gray-200">Beneficios (Array Dinámico)</h3>
                                <button type="button" wire:click="addBeneficio" class="text-xs px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">+ Añadir Beneficio</button>
                            </div>
                            <div class="space-y-4">
                                @foreach($beneficios as $index => $beneficio)
                                    <div class="p-3 border rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 relative">
                                        <button type="button" wire:click="removeBeneficio({{ $index }})" class="absolute top-2 right-2 text-red-500 text-xs font-bold bg-red-100 px-2 py-1 rounded">Quitar</button>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4">
                                            <div>
                                                <label class="text-xs font-semibold dark:text-gray-300">Título del Beneficio</label>
                                                <!-- Lógica core: wire:model="beneficios.{{ $index }}.titulo" -->
                                                <input wire:model="beneficios.{{ $index }}.titulo" type="text" class="w-full px-2 py-1 border rounded text-sm dark:bg-gray-900 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div>
                                                <label class="text-xs font-semibold dark:text-gray-300">Ícono (Nombre Material Icon ej. 'school')</label>
                                                <input wire:model="beneficios.{{ $index }}.icon" type="text" class="w-full px-2 py-1 border rounded text-sm dark:bg-gray-900 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div class="col-span-full">
                                                <label class="text-xs font-semibold dark:text-gray-300">También puede subir un Ícono/Imagen [Opcional]</label>
                                                <!-- Lógica file array: wire:model="beneficios.{{ $index }}.icon_file" -->
                                                <input wire:model="beneficios.{{ $index }}.icon_file" type="file" class="w-full px-2 py-1 border rounded text-sm bg-white dark:bg-gray-900 dark:border-gray-600 dark:text-gray-200" accept="image/*">
                                                <div wire:loading wire:target="beneficios.{{ $index }}.icon_file" class="text-xs text-green-500">Cargando imagen...</div>
                                            </div>
                                            <div class="col-span-full">
                                                <label class="text-xs font-semibold dark:text-gray-300">Descripción Corta</label>
                                                <textarea wire:model="beneficios.{{ $index }}.descripcion" rows="2" class="w-full px-2 py-1 border rounded text-sm dark:bg-gray-900 dark:border-gray-600 dark:text-gray-200"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Bloque Pasos (Dinámico) -->
                        <div class="p-4 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-bold text-gray-700 dark:text-gray-200">Pasos de Postulación (Array Dinámico)</h3>
                                <button type="button" wire:click="addPaso" class="text-xs px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">+ Añadir Paso</button>
                            </div>
                            <div class="space-y-4">
                                @foreach($pasos as $index => $paso)
                                    <div class="p-3 border rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 relative">
                                        <button type="button" wire:click="removePaso({{ $index }})" class="absolute top-2 right-2 text-red-500 text-xs font-bold bg-red-100 px-2 py-1 rounded">Quitar</button>
                                        <div class="grid grid-cols-1 gap-3 mt-4">
                                            <div>
                                                <label class="text-xs font-semibold dark:text-gray-300">Título del Paso</label>
                                                <input wire:model="pasos.{{ $index }}.titulo" type="text" class="w-full px-2 py-1 border rounded text-sm dark:bg-gray-900 dark:border-gray-600 dark:text-gray-200">
                                            </div>
                                            <div>
                                                <label class="text-xs font-semibold dark:text-gray-300">Descripción del Paso</label>
                                                <textarea wire:model="pasos.{{ $index }}.descripcion" rows="2" class="w-full px-2 py-1 border rounded text-sm dark:bg-gray-900 dark:border-gray-600 dark:text-gray-200"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Botones Globales -->
                        <div class="flex justify-end gap-2 pt-4 border-t dark:border-gray-800 sticky bottom-0 bg-white dark:bg-gray-900 py-4 shadow-[0_-10px_10px_-10px_rgba(0,0,0,0.1)]">
                            <button type="button" wire:click="$set('isModalOpen', false)" class="px-6 py-2 border rounded text-gray-600 dark:text-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 font-medium">Cancelar</button>
                            <!-- Estado de carga visual -->
                            <button type="submit" wire:loading.attr="disabled" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium disabled:opacity-50">
                                <span wire:loading.remove wire:target="save">Guardar Beca</span>
                                <span wire:loading wire:target="save">Subiendo archivos...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
