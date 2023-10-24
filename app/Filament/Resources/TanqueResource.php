<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanqueResource\Pages;
use App\Filament\Resources\TanqueResource\RelationManagers;
use App\Models\Tanque;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Fazenda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TanqueResource extends Resource
{
    protected static ?string $model = Tanque::class;
    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationGroup = 'Cadastro';
    protected static ?string $navigationLabel = 'Tanques';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(8)
            ->schema([
                TextInput::make('nome')
                    ->required()
                    ->columnSpan(4)
                    ->maxlength(255)
                    ->placeholder('Digite o nome do tanque')
                    ->label('Nome'),
                TextInput::make('capacidade')
                    ->required()
                    ->columnSpan(4)
                    ->numeric()
                    ->placeholder('Digite a capacidade do tanque')
                    ->label('Capacidade (L)'),
                Select::make('fazenda_id')
                    ->options(Fazenda::all()->pluck('nome', 'id'))
                    ->label('Fazenda')
                    ->columnSpan(4)
                    ->placeholder('Selecione uma fazenda')
                    ->required()
                    ->required(),
                TextArea::make('observacoes')
                    ->columnSpan(8)
                    ->rows(6)
                    ->placeholder('Digite as observações do tanque')
                    ->label('Observações'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('capacidade')
                    ->sortable(),
                TextColumn::make('fazenda.nome', 'fazenda')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('fazenda_id')
                ->relationship('fazenda', 'nome')
                ->options(Fazenda::all()->pluck('nome', 'id'))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTanques::route('/'),
            'create' => Pages\CreateTanque::route('/create'),
            'edit' => Pages\EditTanque::route('/{record}/edit'),
        ];
    }
}