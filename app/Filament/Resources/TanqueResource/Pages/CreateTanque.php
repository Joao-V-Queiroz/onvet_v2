<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Notifications\Notification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTanque extends CreateRecord
{
    protected static string $resource = TanqueResource::class;

    protected static ?string $title = 'Criar Tanque';

    protected function getCreatedNotification(): ?Notification
	{
		return Notification::make()
			->success()
			->title('Tanque criado');
	}

    protected function getHeaderActions(): array
	{
		return [
			Actions\Action::make('back')
				->label('Voltar')
				->url($this->getRedirectUrl())
				->iconSize('sm')
				->icon('fas-arrow-rotate-left'),
		];
	}

    protected function getFormActions(): array
	{
		return [
			Actions\Action::make('create')
				->label(__('Salvar'))
				->submit('create')
				->keyBindings(['mod+s']),
			...(static::canCreateAnother() ? [$this->getCreateAnotherFormAction()] : []),
			$this->getCancelFormAction()->label(__('Cancelar')),
		];
	}

    protected function getRedirectUrl(): string
	{
		return $this->getResource()::getUrl('index');
	}

}