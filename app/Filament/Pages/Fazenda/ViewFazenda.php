<?php

namespace App\Filament\Pages\Fazenda;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Doctrine\DBAL\Schema\Schema;
use App\Forms\Components\PostalCode;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Fazenda as ModelsFazenda;

class ViewFazenda extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $title = '';
    protected static ?string $icon = '';
    protected static bool $shouldRegisterNavigation = false;
    protected static string $view = 'filament.pages.fazenda.view-fazenda';

    //variaveis
    public $nome;
    public $cep;
    public $uf;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cidade;
    public $status;
    public $complemento;
    public $dados;
    public $showNovaFazenda = false;

    public function form(Form $form): Form
    {
        return $form
        ->columns(8)
        ->Schema([
                TextInput::make('nome')
                    ->columnSpan(4)
                    ->label('Nome')
                    ->required()
                    ->disabled()
                    ->maxLength(255),
                PostalCode::make('cep')
                    ->columnSpan(2)
                    ->live(onBlur: true)
                    ->disabled()
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
                    ->disabled()
                    ->maxLength(255),
                TextInput::make('bairro')
                    ->label('Bairro')
                    ->columnSpan(2)
                    ->disabled()
                    ->maxLength(255),
                TextInput::make('cidade')
                    ->label('cidade')
                    ->columnSpan(2)
                    ->disabled()
                    ->maxLength(255),
                TextInput::make('uf')
                    ->label('UF')
                    ->columnSpan(1)
                    ->disabled()
                    ->maxLength(255),
                textInput::make('numero')
                    ->label('Número')
                    ->inputMode('decimal')
                    ->columnSpan(1)
                    ->disabled()
                    ->numeric(),
                TextInput::make('complemento')
                    ->label('Complemento')
                    ->columnSpan(2)
                    ->disabled()
                    ->maxLength(255),
                Toggle::make('status')
                    ->label('Status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->disabled()
                    ->columnSpan(2)
                    ->default(true),
        ]);
    }

    public function voltar()
    {
        return redirect()->to('/admin/fazenda');
    }

    public function editar()
    {
        return redirect()->route('filament.admin.pages.edit-fazenda', ["id" => $this->dados->id]);
    }

    public function excluir()
    {
        $this->dados->delete();
        return redirect()->to('/admin/fazenda');
    }

    public function mount()
    {
        $id = request()->id;
        $this->dados = ModelsFazenda::find($id);
        $this->nome = $this->dados->nome;
        $this->cep = $this->dados->cep;
        $this->logradouro = $this->dados->logradouro;
        $this->cidade = $this->dados->cidade;
        $this->uf = $this->dados->uf;
        $this->bairro = $this->dados->bairro;
        $this->numero = $this->dados->numero;
        $this->complemento = $this->dados->complemento;
        $this->status = $this->dados->status;

        $this->form->fill([
          'nome' => $this->nome,
          'cep' => $this->cep,
          'logradouro' => $this->logradouro,
          'cidade' => $this->cidade,
          'bairro' => $this->bairro,
          'numero' => $this->numero,
          'uf' => $this->uf,
          'complemento' => $this->complemento,
          'status' => $this->status,
        ]);
    }
}
