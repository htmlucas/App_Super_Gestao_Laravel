@extends('app.layouts.basico')

@section('titulo','Pedido Produto')
    
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina2">
            <p>Produto - Adicionar - Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>ID do Pedido: {{ $pedido->id}}</p>
            <p>Cliente ID: {{ $pedido->cliente_id}}</p>
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            <h4>Itens do Pedido</h4>
            @foreach($pedido->produtos as $produto)
                <p>ID:{{$produto->id}} </p>
                <p>Nome:{{$produto->nome}} </p>
                <p>Data de Inclusão do item no pedido: {{$produto->pivot->created_at->format('d/m/Y')}}</p>
                <p>
                <form id="form_{{$produto->pivot->id}}" method="POST" action="{{ route('pedido-produto.destroy',['pedidoProduto' => $produto->pivot->id,'pedido_id' => $pedido->id])}}">
                    @method('DELETE')
                    @csrf
                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                </form>
                </p>
            @endforeach

            @component('app.pedido_produto._components.form_create',['pedido' => $pedido->id,'produtos' => $produtos])
                
            @endcomponent
        </div>
        </div>

    </div>
@endsection