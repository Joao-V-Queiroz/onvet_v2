<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
	protected static ?string $title = 'OnVet';
	protected static ?string $navigationLabel = 'Dashboard';
	public function getColumns(): int | array
	{
		return 2;
	}
}