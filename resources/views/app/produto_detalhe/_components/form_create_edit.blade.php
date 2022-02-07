@if(isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update',['produto_detalhe' => $produto_detalhe->id]) }}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
    @csrf
@endif
                                    <!-- Input produto_id  -->
    <input type="text" name="produto_id" class="borda-preta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto">
    {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
                                    <!-- Input comprimento  -->
    <input type="text" name="comprimento" class="borda-preta" value=" {{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="comprimento">
    {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}
                                    <!-- Input largura  -->
    <input type="text" name="largura" class="borda-preta" value=" {{ $produto_detalhe->largura ?? old('largura') }}" placeholder="largura">
    {{$errors->has('largura') ? $errors->first('largura') : ''}}
                                    <!-- Input altura  -->
    <input type="text" name="altura" class="borda-preta" value=" {{ $produto_detalhe->altura ?? old('altura') }}" placeholder="altura">
    {{$errors->has('altura') ? $errors->first('altura') : ''}}
                                    <!-- Input Unidade de Medida  -->
    <select name="unidade_id" id="">
            <option value="">Selecione a unidade de Medida</option>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
        @endforeach
    </select>

    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
    <button type="submit" class="borda-preta">Cadastrar</button>

</form>