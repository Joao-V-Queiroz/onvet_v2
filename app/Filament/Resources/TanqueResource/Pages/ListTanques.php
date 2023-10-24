<?php

namespace App\Filament\Resources\TanqueResource\Pages;

use App\Filament\Resources\TanqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTanques extends ListRecords
{
    protected static string $resource = TanqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
