<?php

namespace App\Http\Middleware\Log;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Home
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
        //参考admin配置
        return $next($request);
    }
}
