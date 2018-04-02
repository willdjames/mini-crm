<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ApplyLocale {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        app()->setlocale( Session::get('locale') ); //Apply the locale with locale value store in session

        return $next($request); // Após pegar o idioma na sessão, retorna com o response da rota
    }

}
