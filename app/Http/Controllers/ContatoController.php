<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

    //    print_r($request->all());
    //    echo '<br>ou, buscar o valor de um input especifico';
    //    print_r($request->input('nome')); */
        
        // 1º Método
    //    $contato = new SiteContato();
    //    $contato->nome = $request->input('nome');
    //    $contato->telefone = $request->input('telefone');
    //    $contato->email = $request->input('email');
    //    $contato->motivo_contato = $request->input('motivo_contato');
    //    $contato->mensagem = $request->input('mensagem');
    //    print_r($contato->getAttributes());exit; 
    //    $contato->save();
        
        // 2º Método
        // usando método fill nos iremos buscar os campos la do modelo sitecontato em que a variavel fillable disponibiliza pra gente usar
        //$contato = new SiteContato();
        //$contato->fill($request->all()); 
        //$contato->save();

        // 3º Método
        // usando método create nos iremos buscar os campos la do modelo sitecontato em que a variavel fillable disponibiliza pra gente usar
        //$contato = new SiteContato();
        //$contato->create($request->all()); 

        return view('site.contato',['titulo' => 'Contato','motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        //realizar a validação dos requests
        $regras = [
            'nome'=>'required|min:3|max:40|unique:site_contatos',//nomes com no minimo 3 caracteres e no maximo 40
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000',
        ];

        $feedback = [
            'nome.min' => 'O campo Nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no maximo 40 caracteres',

            'email.email' => 'Insira um Email Inválido',
            
            'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres',

            'required' => 'O campo ::atribute deve ser preenchido',
            'unique' => 'O campo ::atribute ja esta em uso',
            
        ];

        $request->validate($regras,$feedback);
        
        SiteContato::create($request->all());

        return redirect()->route('site.index');
        
    }
}
