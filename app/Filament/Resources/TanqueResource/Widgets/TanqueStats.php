<?php

namespace App\Filament\Resources\TanqueResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Resources\TanqueResource\Pages\ListTanques;
use App\Models\Tanque;

class TanqueStats extends BaseWidget
{
    use InteractsWithPageTable;

	protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
	{
		return ListTanques::class;
	}

    protected function getStats(): array
    {
        return [
		Stat::make('Total de Tanques', Tanque::count())
			->icon('heroicon-o-rectangle-stack')
			->chart([2, 10, 3, 12, 1, 14, 10, 1, 2, 10])
			->extraAttributes([
				'class' => 'cursor-pointer',
		]),
	    Stat::make('Tanques Ativos', Tanque::where('status', '1')->count())
			->icon('heroicon-o-rectangle-stack')
			->chart([2, 10, 3, 12, 1, 14, 10, 1, 2, 10])
			->extraAttributes([
				'class' => 'cursor-pointer',
			]),
        ];
    }
}