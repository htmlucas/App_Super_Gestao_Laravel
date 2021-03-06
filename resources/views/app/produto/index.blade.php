@extends('app.layouts.basico')

@section('titulo','Fornecedor')
    
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">

               
              <table border="1" width="100%">
                  <thead>
                      <tr>
                          <th>Nome</th>
                          <th>Descriçao</th>
                          <th>Nome do Fornecedor</th>
                          <th>Site do Fornecedor</th>
                          <th>Peso</th>
                          <th>Unidade ID</th>
                          <th>Comprimento</th>
                          <th>Altura</th>
                          <th>Largura</th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome}}</td>
                            <td>{{ $produto->descricao}}</td>
                            <td>{{ $produto->fornecedor->nome}}</td>
                            <td>{{ $produto->fornecedor->site}}</td>
                            <td>{{ $produto->peso}}</td>
                            <td>{{ $produto->unidade_id}}</td>
                            <td>{{ $produto->itemDetalhe->comprimento ?? ''}}</td>
                            <td>{{ $produto->itemDetalhe->altura ?? ''}}</td>
                            <td>{{ $produto->itemDetalhe->largura ?? ''}}</td>
                            <td><a href="{{ route('produto.show',['produto' => $produto->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" action="{{ route('produto.destroy',['produto' => $produto->id ]) }}" method="post">    
                                    @method('DELETE')
                                    @csrf
                                    <a onclick="document.getElementById('form_{{$produto->id}}').submit()" href="#">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('produto.edit',['produto' => $produto->id]) }}">Editar</a></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                <p>Exibir ID do Pedido(s)</p>   
                                @foreach($produto->pedidos as $pedido)
                                <a href="{{ route('pedido-produto.create',['pedido' => $pedido->id])}}">
                                ID Pedido: {{ $pedido->id}},
                                </a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
              <div style="width:90%;margin-left:auto;margin-right:auto;">
               {{ $produtos->appends($request)->links()}}

              </div>
            </div>
        </div>

    </div>
@endsection