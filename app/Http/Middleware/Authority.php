<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Authority
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user() && Auth::user()->checkPermission(request()->getMethod(),$request->route()->getName())) {
            return $next($request);
        }
        throw new AccessDeniedHttpException('Unauthorized access.');
    }
}
