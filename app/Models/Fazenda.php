<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tanque;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fazenda extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'nome',
        'cep',
        'cidade',
        'uf',
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'status',
    ];

    public function tanques(): HasOne
    {
        return $this->hasMany(Tanque::class);
    }

}