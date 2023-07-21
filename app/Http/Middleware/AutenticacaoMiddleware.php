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
    public function handle($request, Closure $next)
    {
        // verifica se o usuario tem acesso a rota
        if($request->server->get('REMOTE_ADDR') == '127.0.0.1') {
            return $next($request);
        } else {
            return Response('negado');
        }
    }
}
