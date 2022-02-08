@extends('app.layouts.basico')

@section('titulo','Cliente')
    
@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">

               
              <table border="1" width="100%">
                  <thead>
                      <tr>
                          <th>Nome</th>
                          <th>Visualizar</th>
                          <th>Excluir</th>
                          <th>Editar</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome}}</td>                            
                            <td><a href="{{ route('cliente.show',['cliente' => $cliente->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" action="{{ route('cliente.destroy',['cliente' => $cliente->id ]) }}" method="post">    
                                    @method('DELETE')
                                    @csrf
                                    <a onclick="document.getElementById('form_{{$cliente->id}}').submit()" href="#">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('cliente.edit',['cliente' => $cliente->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
              <div style="width:90%;margin-left:auto;margin-right:auto;">
               {{ $clientes->appends($request)->links()}}

              </div>
            </div>
        </div>

    </div>
@endsection