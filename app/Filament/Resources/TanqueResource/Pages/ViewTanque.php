<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTanque extends ViewRecord
{
    protected static string $resource = TanqueResource::class;

    protected static ?string $title = 'Visualizar Tanque';

	protected function getHeaderActions(): array
	{
		return [
			Actions\DeleteAction::make()
                ->label('Excluir')
                ->icon('fas-trash-alt')
                ->iconSize('sm'),
			Actions\EditAction::make()
                ->label('Editar')
                ->icon('fas-pencil-alt')
                ->iconSize('sm'),
			Actions\Action::make('back')
				->label('Voltar')
				->url($this->getRedirectUrl())
				->iconSize('sm')
				->icon('fas-arrow-rotate-left'),
		];
	}

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}