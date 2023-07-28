<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    public function produtos() {
        // return $this->belongsToMany('{model}', '{tabela auxiliar}');
        // return $this->belongsToMany('App\Produto', 'pedido_produtos');

        // trazendo colunas pivot pelo relacionamento
        return $this->belongsToMany('App\Produto', 'pedido_produtos')->withPivot('id', 'created_at', 'updated_at');
    }
}
