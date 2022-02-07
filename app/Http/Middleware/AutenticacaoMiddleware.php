<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$metodo_autenticacao,$perfil)
    {
        /* //veficia se o usuario está autenticado
        echo $metodo_autenticacao.' - '.$perfil.'<br>';
        
        
        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuario e senha no banco de dados'.$perfil.'<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'verificar usuario e senha no ad'.$perfil.'<br>';
        }

        if($perfil == 'visitante'){
            echo 'Limitar recursos';
        }else{
            echo 'Carregar o perfil do banco de dados';
        }

        if(true){
            return $next($request);  
        }else{
            return Response('Acesso Negado');
        }
        //return $next($request); */
        

        session_start();
        if(isset($_SESSION['email']) && $_SESSION['email'] != '' ){
            return $next($request);
        }else{
            return redirect()->route('site.login',['erro'=>2]);
        }

    }
}
