<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //$request -> manipular
        //return $next($request);
        // response -> manipular
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log'=>"IP $ip requisitou a rota $rota"]);
        
        //return $next($request);
        $resposta = $next($request);

        $resposta->setStatusCode(201,'O status da resposta e o texto da resposta foram modificados');

        return $resposta;
        //return Response('Chegamos no Middleware e finalizamos no proprio Middleware');
    }

}
