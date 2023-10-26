<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTanque extends EditRecord
{
    protected static string $resource = TanqueResource::class;

    protected static ?string $title = 'Editar Tanque';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
               ->label('Excluir')
               ->icon('fas-trash-alt')
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

    protected function getFormActions(): array
	{
		return [
			Actions\Action::make('create')
				->label(__('Salvar'))
				->submit('create')
				->keyBindings(['mod+s']),
		];
	}

}
