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
				<div class="-mt-12 flex justify-end">
					<x-filament::button wire:click="novaFazenda(false)">
						Voltar
					</x-filament::button>
				</div>
			</div>
		@endif
	</div>
	@if (!$showNovaFazenda)
		<div class="-mt-8">{{ $this->table }}</div>
	@endif
	@if ($showNovaFazenda)
		<div>
			<div>
				<form wire:submit.prevent="save">
					<x-filament::section>
						<div>
							<div class="-mt-8">{{ $this->form }}</div>
						</div>
						<div class="mt-7">
						</div>
					</x-filament::section>
                     <br>
                    <div class="mt-16">
                        <x-filament::button type="submit" class="mb-8">
                            Salvar
                        </x-filament::button>
                    </div>
				</form>
			</div>
		</div>
	@endif
</x-filament-panels::page>
