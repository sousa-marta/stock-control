<?php

namespace App\Http\Middleware;

use Closure;
use Auth; //para poder usar a parte de login

class CheckUser
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
        //Recuperando infos do usuário
        $user = Auth::user(); //retorna false se não tiver nenhum usuário logado
        if($user){
            return $next($request);
        }else {
            return redirect('/login');
        }

        return $next($request);
    }
}
