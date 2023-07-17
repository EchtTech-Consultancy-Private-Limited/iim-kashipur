<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class LocaleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(empty(session('Lang'))){
        $locale = config('app.locale');
        session(['Lang' => $locale]);
        }
        else{
        if(in_array(session('Lang'), ['en', 'hi'])){
        $locale = session('Lang');
        }
        else{
          $locale = config('app.locale');
          session(['Lang' => $locale]);
        }
      }
        App::setLocale($locale);
        return $next($request);
    }
}
