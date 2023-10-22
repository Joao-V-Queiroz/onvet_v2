<?php

namespace App\Filament\Pages\Fazenda;

use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use App\Models\Fazenda as ModelsFazenda;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Fazenda extends Page implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
	protected static ?string $title = '';
	protected static ?string $navigationLabel = 'Fazendas';
	protected static ?string $navigationGroup = 'Cadastro';
	protected static ?int $navigationSort = 0;
    protected static string $view = 'filament.pages.fazenda.fazenda-page';

    public $showNovaFazenda = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(ModelsFazenda::query())
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    //para fazer com que table e button apareçam na mesma página
    public function novaFazenda($value)
	{
		$this->showNovaFazenda = $value;
		$this->form->fill();
	}
}
