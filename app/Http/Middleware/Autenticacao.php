<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Autenticacao
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
        if (!session()->has('Usuario') && ($request->path() != '/' && $request->path() != '/cadastrar' && $request->path() != '/logar' && $request->path() != '/sair' && $request->path() != '/cadastro')) {
            return redirect('/')->with(['fail' => 'Você precisa estar logado para realizar essa ação!']);
        }

        return $next($request)->header('Cache-Control', 'no-cache', 'no-store', 'max-age=0', 'must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
