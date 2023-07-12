<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    // definindo tabela com o plural correto
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email'
    ];
}
