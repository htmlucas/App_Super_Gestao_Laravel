@if(isset($produto->id))
    <form method="post" action="{{ route('produto.update',['produto' => $produto->id]) }}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produto.store') }}">
    @csrf
@endif
                                    <!-- Input Nome  -->
    <input type="text" name="nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome">
    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                                    <!-- Input Descricao  -->
    <input type="text" name="descricao" class="borda-preta" value=" {{ $produto->descricao ?? old('descricao') }}" placeholder="Descricao">
    {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                                    <!-- Input Peso  -->
    <input type="text" name="peso" class="borda-preta" value=" {{ $produto->peso ?? old('peso') }}" placeholder="Peso">
    {{$errors->has('peso') ? $errors->first('peso') : ''}}
                                    <!-- Input Unidade de Medida  -->
    <select name="unidade_id" id="">
            <option value="">Selecione a unidade de Medida</option>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
        @endforeach
    </select>

    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
    <button type="submit" class="borda-preta">Cadastrar</button>

</form>