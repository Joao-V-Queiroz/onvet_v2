<x-filament-panels::page>
    <x-filament::breadcrumbs :breadcrumbs="[
        '/admin/fazenda' => 'Fazendas',
        '' => 'Visualizar Fazenda',
    ]" />
    <div div class="flex justify-between items-center">
        <h1 class="fi-header-heading -mt-5 text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
            Visualizar Fazenda
        </h1>
        <div class="relative">
            <div class="flex-mt-10">
                <x-filament::button wire:click="excluir" color="danger">
                    Excluir
                </x-filament::button>
                <x-filament::button class="ml-4" wire:click="editar">
                    Editar
                </x-filament::button>
                <x-filament::button class="ml-4" wire:click="voltar">
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
            </div>
            </form>
        </div>
    @endif
</x-filament-panels::page>
