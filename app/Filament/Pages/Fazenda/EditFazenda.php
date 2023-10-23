<?php

namespace App\Filament\Pages\Fazenda;

use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Forms\Components\PostalCode;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use App\Models\Fazenda as ModelsFazenda;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;

class EditFazenda extends Page implements HasForms
{

    use InteractsWithForms;

    protected static string $view = 'filament.pages.fazenda.edit-fazenda';
    protected static ?string $title = '';
    protected static bool $shouldRegisterNavigation = false;

    //variaveis
    public $nome;
    public $cep;
    public $logradouro;
    public $cidade;
    public $bairro;
    public $numero;
    public $uf;
    public $complemento;
    public $status;
    public $dados;
    public $showNovaFazenda = false;


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
        ModelsFazenda::where('id', $this->dados->id)->update($dados);
        return redirect()->to('/admin/fazenda');
    }

    public function voltar()
    {
       return redirect()->to('/admin/fazenda');
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
        $this->bairro = $this->dados->bairro;
        $this->numero = $this->dados->numero;
        $this->uf = $this->dados->uf;
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

    public function novaFazenda($value)
    {
        $this->showNovaFazenda = $value;
        $this->form->fill();
    }

}
