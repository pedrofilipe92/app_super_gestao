<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "$ip request da rota $rota"]);

        // manipulando a resposta das requisições
        $resposta = $next($request);
        // setStatusCode({statusCode}, {statusText})
        $resposta->setStatusCode(201, 'mudou');
        return $resposta;
    }
}
