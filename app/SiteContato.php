<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteContato extends Model
{
    // implementando deleted_at
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'motivo_contato',
        'mensagem'
    ];
}
