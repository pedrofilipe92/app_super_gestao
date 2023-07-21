<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        // passando parametros para a middleware
        if ($metodo_autenticacao == 'padrao') {
            echo $perfil;
            // verifica se o usuario tem acesso a rota
            if($request->server->get('REMOTE_ADDR') == '127.0.0.1') {
                return $next($request);
            } else {
                return Response('negado');
            }
        } else {
            return Response('outro metodo');
        }
    }
}
