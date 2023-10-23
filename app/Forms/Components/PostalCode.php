<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Component as Livewire;
use Filament\Forms\Components\Component;

class PostalCode extends TextInput
{
	public function viaCep(
		string $errorMessage = 'CEP inválido.',
		array $setFields = []
	): static {
		$viaCepRequest = function (
			$state,
			$livewire,
			$set,
			$component,
			string $errorMessage,
			array $setFields
		) {
			$livewire->validateOnly($component->getKey());

			$request = Http::withoutVerifying()->get("https://viacep.com.br/ws/$state/json/")->json();

			foreach ($setFields as $key => $value) {
				$set($key, $request[$value] ?? null);
			}

			if (Arr::has($request, 'erro')) {
				throw ValidationException::withMessages([$component->getKey() => $errorMessage]);
			}

			$livewire->dispatch('cep');
		};
		$this
			->mask('99999-999')
			->minLength(9)
			->required()
			->label('cep')
			->afterStateUpdated(function ($state, Livewire $livewire, Set $set, Component $component) use ($errorMessage, $setFields, $viaCepRequest) {
				$viaCepRequest($state, $livewire, $set, $component, $errorMessage, $setFields);
			})
			->suffixAction(
				Action::make('search-actions')
					->label('Buscar cep')
					->icon('heroicon-o-magnifying-glass')
					->action(
						function($state, Livewire $livewire, Set $set, Component $component) use ($viaCepRequest, $errorMessage, $setFields) {
                           $viaCepRequest($state, $livewire, $set, $component, $errorMessage, $setFields);

						}
					)
			);
		return $this;
	}
}
