<x-filament-panels::page>
        <x-filament::breadcrumbs :breadcrumbs="[
            '/admin/fazenda' => 'Fazendas',
        ]" />
        <div class="flex justify-between items-center">
            <h1 class="fi-header-heading text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                Fazendas
            </h1>
            @if (!$showNovaFazenda)
                <div class="relative">
                    <div class="mb-8 flex justify-end">
                        <x-filament::button wire:click="novaFazenda(true)">
                            Nova Fazenda
                        </x-filament::button>
                    </div>
                </div>
            @endif
            @if ($showNovaFazenda)
                <div class="relative">
                    <div class="mb-8 flex justify-end">
                        <x-filament::button wire:click="novaFazenda(false)">
                            Voltar
                        </x-filament::button>
                    </div>
                </div>
            @endif
        </div>
        @if (!$showNovaFazenda)
            <div class="mt-20">{{ $this->table }}</div> <!-- Ajuste da margem superior -->
        @endif
</x-filament-panels::page>
