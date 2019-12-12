<?php

namespace App\Http\Middleware;

use Closure;

class Request
{
    /**
     * 请求处理.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
