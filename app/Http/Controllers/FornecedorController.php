<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /* public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '', //São Paulo (SP)
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', //Fortaleza (CE)
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32', //Juiz de fora (MG)
                'telefone' => '0000-0000'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    } */

    public function index(){
        return view('app.fornecedores.index');
    }
    public function listar(Request $request){
        $fornecedores = Fornecedor::with(['produtos'])->where('nome','like','%'.$request->input('nome').'%')
            ->where('site','like','%'.$request->input('site').'%')
            ->where('uf','like','%'.$request->input('uf').'%')
            ->where('email','like','%'.$request->input('email').'%')
            ->paginate(5);
            
        return view('app.fornecedores.listar',['fornecedores'=>$fornecedores,'request' => $request->all()]);
    }
    public function adicionar(Request $request){
        $msg = '';

        //adicionar
        if($request->input('_token') != '' && $request->input('id') == ''){
            //cadastro

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',

            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 Caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 40 Caracteres',
                'uf.min' => 'O campo uf deve ter no minimo 2 Caracteres',
                'uf.max' => 'O campo uf deve ter no maximo 2 Caracteres',
                'email' => 'O campo Email nao foi preenchido corretamente'

            ];

            $request->validate($regras,$feedback); 

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';

        }

        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Update realizado com sucesso!';
            } else{
                $msg =  'update deu ruim';
            }
            return redirect()->route('app.fornecedor.editar',['id'=>$request->input('id') ,'msg' => $msg]);
        }

        return view('app.fornecedores.adicionar',['msg' => $msg]);
    }

    public function editar($id,$msg=''){

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedores.adicionar',['fornecedor' => $fornecedor,'msg' => $msg]);
    }
    
    public function excluir($id){
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}

