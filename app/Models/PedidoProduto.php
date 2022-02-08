<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
        #caso eu queira mudar o nome do banco de dados porque o plural nao vai ficar certo em pt-br
    protected $table = 'pedidos_produtos';
}
