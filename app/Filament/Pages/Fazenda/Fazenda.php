<?php

namespace App\Filament\Pages\Fazenda;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use App\Forms\Components\PostalCode;
use App\Models\Fazenda as ModelsFazenda;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
    public $nome;
    public $cep;
    public $logradouro;
    public $cidade;
    public $uf;
    public $numero;
    public $complemento;
    public $bairro;
    public $status;

    public function table(Table $table): Table
    {
        return $table
            ->query(ModelsFazenda::query())
            ->columns([
                TextColumn::make('nome')->label('Nome')->searchable()->sortable(),
                TextColumn::make('cidade')->label('Cidade'),
                TextColumn::make('uf')->label('UF'),
                TextColumn::make('logradouro')->label('Logradouro'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')
                    ->label('Visualizar')
                    ->icon('heroicon-o-eye')
                    ->url(fn (ModelsFazenda $record) => route('filament.admin.pages.view-fazenda', ["id" => $record])),
                Action::make('edit')
                    ->label('Editar')
                    ->icon('heroicon-o-pencil')
                    ->url(fn (ModelsFazenda $record) => route('filament.admin.pages.edit-fazenda', ["id" => $record])),
                Action::make('delete')
                    ->label('Excluir')
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->action(fn (ModelsFazenda $record) => $record->delete()),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(8)
            ->schema([
                TextInput::make('nome')
                    ->columnSpan(4)
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                PostalCode::make('cep')
                    ->columnSpan(2)
                    ->live(onBlur: true)
                    ->viaCep(
                        setFields: [
                            'logradouro' => 'logradouro',
                            'bairro' => 'bairro',
                            'cidade' => 'localidade',
                            'uf' => 'uf',
                        ]
                    ),
                TextInput::make('logradouro')
                    ->label('Endereço')
                    ->columnSpan(2)
                    ->maxLength(255),
                TextInput::make('bairro')
                    ->label('Bairro')
                    ->columnSpan(2)
                    ->maxLength(255),
                TextInput::make('cidade')
                    ->label('cidade')
                    ->columnSpan(2)
                    ->maxLength(255),
                TextInput::make('uf')
                    ->label('UF')
                    ->columnSpan(1)
                    ->maxLength(255),
                textInput::make('numero')
                    ->label('Número')
                    ->inputMode('decimal')
                    ->columnSpan(1)
                    ->numeric(),
                TextInput::make('complemento')
                    ->label('Complemento')
                    ->columnSpan(2)
                    ->maxLength(255),
                 Toggle::make('status')
                    ->label('Status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->columnSpan(2)
                    ->default(true),
            ]);
    }

    public function save()
    {
        $dados = $this->form->getState();

        ModelsFazenda::create($dados);
        $this->form->fill();

        return redirect()->to('/admin/fazenda');
    }

    public function novaFazenda($value)
    {
        $this->showNovaFazenda = $value;
        $this->form->fill();
    }
}
