<?php

use Livewire\Volt\Component;
use App\Models\Beca;
use Illuminate\Support\Str;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';

    public function layout()
    {
        return 'components.layouts.app';
    }

    public function title()
    {
        return 'Listado de Becas';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        Beca::destroy($id);
    }

    public function with(): array
    {
        return [
            'becas' => Beca::query()
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10)
        ];
    }
}; ?>

<div class="p-8 max-w-[1400px] mx-auto w-full">
    <!-- Breadcrumbs & Title -->
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl font-black text-on-surface tracking-tight leading-none mb-2">Listado de Becas</h2>
            <p class="text-on-surface-variant font-medium">Administra y supervisa el ciclo de vida de los programas académicos.</p>
        </div>
        <div class="flex gap-3 items-center">
            <!-- Search Input local al componente -->
            <div class="relative group w-64">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors text-sm">search</span>
                <input wire:model.live.debounce.300ms="search" class="w-full bg-surface-container-low border-none rounded-xl py-2.5 pl-9 pr-4 text-sm focus:ring-2 focus:ring-primary/20 placeholder:text-slate-400 font-inter" placeholder="Buscar becas por nombre..." type="search"/>
            </div>
            
            <button class="hidden md:flex items-center gap-2 px-4 py-2.5 bg-surface-container-high text-on-surface-variant font-bold rounded-xl hover:bg-surface-container-highest transition-colors text-sm">
                <span class="material-symbols-outlined text-lg">filter_list</span>
                Filtros
            </button>
            <a href="{{ route('admin.becas.create') }}" wire:navigate class="flex items-center gap-2 px-6 py-2.5 bg-primary text-on-primary font-bold rounded-xl shadow-lg shadow-primary/30 hover:bg-primary-dim transition-all active:scale-95 text-sm whitespace-nowrap">
                <span class="material-symbols-outlined text-lg">add</span>
                Nueva Beca
            </a>
        </div>
    </div>
    
    <!-- Stats Overview (Asymmetric Bento Lite) -->
    <div class="grid grid-cols-12 gap-6 mb-10">
        <div class="col-span-12 bg-surface-container-lowest rounded-full p-8 shadow-sm flex items-center justify-between border border-primary/5">
            <div class="flex items-center gap-6 px-4">
                <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">stars</span>
                </div>
                <div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant">Becas Totales</span>
                    <p class="text-3xl font-black text-on-surface leading-none">{{ $becas->total() }}</p>
                </div>
            </div>
            <div class="h-10 w-[1px] bg-slate-200"></div>
            <div class="flex items-center gap-6 px-4">
                <div class="w-12 h-12 rounded-full bg-tertiary-container/20 flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">history</span>
                </div>
                <div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant">Próximas</span>
                    <p class="text-3xl font-black text-on-surface leading-none">--</p>
                </div>
            </div>
            <div class="h-10 w-[1px] bg-slate-200"></div>
            <div class="flex items-center gap-6 px-4">
                <div class="w-12 h-12 rounded-full bg-error-container/20 flex items-center justify-center text-error">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">block</span>
                </div>
                <div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant">Cerradas</span>
                    <p class="text-3xl font-black text-on-surface leading-none">--</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Premium Data Table Container -->
    <div class="bg-surface-container-lowest rounded-[2rem] overflow-hidden shadow-[0px_12px_32px_rgba(49,50,58,0.06)] border border-slate-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-max">
                <thead>
                    <tr class="bg-surface-container-low">
                        <th class="px-8 py-5 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">Título de la Beca</th>
                        <th class="px-6 py-5 text-[11px] font-black uppercase tracking-widest text-on-surface-variant">Creación</th>
                        <th class="px-8 py-5 text-[11px] font-black uppercase tracking-widest text-on-surface-variant text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y-0">
                    @forelse($becas as $beca)
                    <tr class="group hover:bg-surface-container-low transition-colors duration-150 relative">
                        <!-- Clickable Row (via absolute link overlay or cursor pointer) -->
                        <td class="px-8 py-5 cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center text-primary font-black text-xs">
                                    {{ strtoupper(substr($beca->nombre, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-on-surface">{{ $beca->nombre }}</p>
                                    <p class="text-xs text-on-surface-variant">{{ Str::limit($beca->titulo, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm text-on-surface-variant font-medium">{{ $beca->created_at->format('d M, Y') }}</p>
                        </td>
                        <td class="px-8 py-5 text-right flex items-center justify-end h-full mt-2">
                            <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.becas.edit', $beca) }}" wire:navigate class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors flex items-center justify-center" title="Editar">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </a>
                                <button wire:click="confirmDelete({{ $beca->id }})" onclick="return confirm('¿Seguro de que deseas eliminar esta beca?') || event.stopImmediatePropagation()" class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors flex items-center justify-center" title="Eliminar">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-10 text-center space-y-3">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant/50">search_off</span>
                            <p class="text-sm font-medium text-on-surface-variant">No se encontraron becas registradas.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination Footer -->
        @if($becas->hasPages())
        <div class="px-8 py-5 bg-surface-container-low flex items-center justify-between border-t border-slate-100">
            <div class="w-full">
                {{ $becas->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
