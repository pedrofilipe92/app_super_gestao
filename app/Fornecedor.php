<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    // implementando deleted_at
    use SoftDeletes;

    // definindo tabela com o plural correto
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email'
    ];

    public function produtos() {
        return $this->hasMany('App\Produto');
    }
}
