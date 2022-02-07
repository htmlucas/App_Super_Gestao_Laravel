<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao','peso','unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');

        /* Cada Produto tem um produtoDetalhe
        portanto ele vai procurar 1 registro relacionado em produto_detalhes com base na fk (produto_id) -> que vem de Produtos (pk) (id) */
    }
}
