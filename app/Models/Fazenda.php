<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

}
