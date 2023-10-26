<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTanques extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = TanqueResource::class;

    protected static ?string $title = 'Tanques';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Novo Tanque'),
        ];
    }

    protected function getHeaderWidgets(): array
	{
		return TanqueResource::getWidgets();
	}

}
