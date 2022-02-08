<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\Item;


class ProdutoController extends Controller
{
    
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe','fornecedor'])->paginate(10);
            
        return view('app.produto.index',['produtos'=>$produtos,'request' => $request->all()]);
    }

    
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create',['unidades' => $unidades,'fornecedores' => $fornecedores]);
    }

    
    public function store(Request $request)
    {
        #instanciar e pegar os valores do request(formulário)
            /* $produto = new Produto();
            $nome = $request->get('nome');
            $descricao = $request->get('descricao');
            $peso = $request->get('peso');
            $unidade_id = $request->get('unidade_id'); */
        
        #tratar os dados para serem inseridos no banco e salvar
           /*  $nome = strtoupper($nome);
            $produto->nome($nome);
            $produto->descricao($descricao);
            
            $produto->save(); */
        
        
        #regras

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
                            # a existencia| de um id valido | na tabela fornecedores
        ];
        
        #validacao
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada nao existe',
            'fornecedor_id.exists' => 'O fornecedor Informado não existe'
        ];

        $request->validate($regras,$feedback);

        Item::create($request->all());    
        return redirect()->route('produto.index');
    }

    
    public function show(Produto $produto)
    {
        return view('app.produto.show',['produto'=>$produto]);
    }


    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit',['produto' => $produto, 'unidades' => $unidades,'fornecedores' => $fornecedores]);
        //return view('app.produto.create',['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
                            # a existencia| de um id valido | na tabela fornecedores
        ];
        #validacao

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada nao existe',
            'fornecedor_id.exists' => 'O fornecedor Informado não existe'
        ];

        $request->validate($regras,$feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show',['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
