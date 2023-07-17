<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FrameHeadersMiddleware 
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
        $response = $next($request);
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block'); // Anti cross site scripting (XSS)
        $response->headers->set('X-Content-Type-Options', 'nosniff'); // Reduce exposure to drive-by dl attacks
       // $response->headers->set('Content-Security-Policy', 'default-src \'self\'');
        $response->headers->set('Strict-Transport-Security', 'max-age:31536000; includeSubDomains');
        return $response;
    }
}