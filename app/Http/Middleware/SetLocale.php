<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class SetLocale
{
    // private $locales = ['ar', 'en'];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($request->hasHeader("Accept-Language")){
            App::setlocale($request->header("Accept-Language"));
        }

        if(session()->has('lang')){
            App::setlocale(session()->get('lang'));
        }
        // if (array_search($locale, $this->locales) === false) {
        //     return redirect('/');
        // }

        // App::setLocale($locale);

        return $next($request);
    }
}
