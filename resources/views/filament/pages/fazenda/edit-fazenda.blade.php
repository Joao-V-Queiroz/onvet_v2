<x-filament-panels::page>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <x-filament::breadcrumbs :breadcrumbs="[
        '/admin/fazenda' => 'Fazendas',
        '' => 'Editar Fazenda',
    ]" />
    <div class="flex justify-between items-center">
        <h1 class="-mt-5 text-2xl font-bold tracking-tight fi-header-heading text-gray-950 dark:text-white sm:text-3xl">
            Editar Fazenda
        </h1>
        <div class="relative">
            <div class="flex-mt-10">
                <x-filament::button wire:click="excluir" color="danger">
                    Excluir
                </x-filament::button>
                <x-filament::button wire:click="voltar" class="ml-4">
                    Voltar
                </x-filament::button>
            </div>
        </div>
    </div>
    @if (!$showNovaFazenda)
        <div>
            <div>
                <form wire:submit.prevent="save">
                    <x-filament::section>
                        <div>
                            {{ $this->form }}
                        </div>
                        <div class="mt-7">
                        </div>
                    </x-filament::section>
                    <br>
                    <div class="mt-7">
                        <div class="mb-8">
                            <x-filament::button type="submit" class="btn-success-sm">
                                Salvar Alterações
                            </x-filament::button>
                            <x-filament::button wire:click="voltar" class="ml-4" color="danger">
                                Cancelar
                            </x-filament::button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</x-filament-panels::page>
