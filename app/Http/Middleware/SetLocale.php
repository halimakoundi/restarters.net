<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Closure;

class SetLocale
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
        if (Auth::check()) {

            $user = Auth::user();
            $locale = $user->language;

            App::setLocale($locale);
        }

         return $next($request);
     }
}
