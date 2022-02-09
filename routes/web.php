<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;

Route::get('/',[PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos',[SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato',[ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato',[ContatoController::class, 'salvar'])->name('site.contato');

route::get('/login/{erro?}',[LoginController::class , 'index' ])->name('site.login');
route::post('/login',[LoginController::class , 'autenticar' ])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){    
    route::get('/home',[HomeController::class,'index' ])->name('app.home');
    route::get('/sair',[LoginController::class,'sair' ])->name('app.sair');

    //produtos
    route::resource('produto',ProdutoController::class);
    /* route::get('/produto',[ProdutoController::class,'index' ] )->name('app.produto');
    route::get('/produto/create',[ProdutoController::class,'create' ] )->name('app.produto.create'); */
    
    //produto detalhe
    route::resource('produto-detalhe',ProdutoDetalheController::class);

    //cliente
    route::resource('cliente',ClienteController::class);
    //pedido
    route::resource('pedido',PedidoController::class);
    
    
    //pedido-produto
    //route::resource('pedido-produto',PedidoProdutoController::class);
    Route::get('pedido-produto/create/{pedido}',[PedidoProdutoController::class,'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}',[PedidoProdutoController::class,'store'])->name('pedido-produto.store');
    //Route::delete('pedido-produto.destroy/{pedido}/{produto}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');
    Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');

    
    //fornecedor
    route::get('/fornecedor',[FornecedorController::class, 'index'])->name('app.fornecedor');
    route::post('/fornecedor/listar',[FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    route::get('/fornecedor/listar',[FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    route::get('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    route::post('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    route::get('/fornecedor/editar/{id}/{msg?}',[FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    route::get('/fornecedor/excluir/{id}',[FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

});

// --------------------------- enviar parametros para um controller -------------------------------
//Route::get('/teste/{p1}/{p2}',[TesteController::class, 'teste'])->name('teste');

// --------------------------- caso a rota nao exista ----------------------------------------
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique Aqui para voltar</a>';
});

//  ----------------------- 2 maneiras de redirecionar  -----------------------------

                        // --------- 1 maneira ---------------
        /* route::get('/rota1',function(){
            echo 'Rota 1';
        })->name('site.rota1');
        
        route::get('/rota2',function(){
            return redirect()->route('site.rota1');
        })->name('site.rota2'); */

                        // ----------- 2 maneira --------------
        //route::redirect('/rota2','/rota1'); redirect do obj route
        // CASO VC QUEIRA QUE ALGUEM SEJA REDIRECIONADO AO DIGITAR A ROTA NO PRIMEIRO PARAMETRO

// -------------------------- enviando parametros -------------------------------------
/* route::get
('/contato/{nome}/{categoria_id}',
function(
    string $nome = 'Desconhecido',
    int $categoria_id = 1
    ) {
    echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id','[0-9]+')->where('nome','[A-Z\a-z]+'); */