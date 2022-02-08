<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome','descricao','peso','unidade_id','fornecedor_id'];

    public function itemDetalhe(){
        return $this->hasOne('App\Models\ItemDetalhe','produto_id','id');

        /* Cada Produto tem um produtoDetalhe
        portanto ele vai procurar 1 registro relacionado em produto_detalhes com base na fk (produto_id) -> que vem de Produtos (pk) (id) */
    }

    public function fornecedor() {
        return $this->belongsTo('App\Models\Fornecedor');
    }
}
