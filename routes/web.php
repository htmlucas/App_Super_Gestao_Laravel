<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;


Route::get('/',[PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos',[SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato',[ContatoController::class, 'contato'])->name('site.contato');

route::get('/login',function(){return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function(){    
    route::get('/clientes',function(){return 'Clientes'; })->name('app.clientes');
    route::get('/fornecedores',[FornecedorController::class, 'index'])->name('app.fornecedores');
    route::get('/produtos',function(){return 'Produtos'; })->name('app.produtos');
});

// --------------------------- enviar parametros para um controller -------------------------------
Route::get('/teste/{p1}/{p2}',[TesteController::class, 'teste'])->name('teste');

// --------------------------- caso a rota nao exista ----------------------------------------
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique Aqui para voltar</a>';
});

//  ----------------------- 2 maneiras de redirecionar  -----------------------------

// ------------------------- 1 maneira --------------------------------------------
/* route::get('/rota1',function(){
    echo 'Rota 1';
})->name('site.rota1');
 
route::get('/rota2',function(){
    return redirect()->route('site.rota1');
})->name('site.rota2'); */

// --------------------------- 2 maneira -------------------------------------------
//route::redirect('/rota2','/rota1'); redirect do obj route


// -------------------------- enviando parametros -------------------------------------

/* route::get
('/contato/{nome}/{categoria_id}',
function(
    string $nome = 'Desconhecido',
    int $categoria_id = 1
    ) {
    echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id','[0-9]+')->where('nome','[A-Za-Z]+'); */