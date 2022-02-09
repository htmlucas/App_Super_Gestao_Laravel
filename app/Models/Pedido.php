<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        //return $this->belongsToMany('App\Models\Produto','pedidos_produtos'); exemplo de relacionamento quando o nome do model é padronizado
        return $this->belongsToMany('App\Models\Item','pedidos_produtos','pedido_id','produto_id')->withPivot('created_at','id');
        /*
            PARAMETROS DOS RELACIONAMENTOS (BELONGS TO MANY, HAS ONE,BELONGS TO...)
            
            1 - Modelo do relacionamento em relacao ao modelo em que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento (pedido_id)
            4 - Representa o nome da FK da tabela mapeada pelo model utilizada no relacionamento que estamos

            pivot armazena algumas informacoes da tabela de relacionamento que talvez nao sao acessiveis, entao para
            conseguir recuperar e usar elas é necessario chamar ->withPivot() com o parametro da informacao que vc quer


        */


    }
}
