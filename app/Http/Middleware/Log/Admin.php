<?php

namespace App\Http\Middleware\Log;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Admin
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
        if($request->method() != 'GET'){
            $log = [
                'ip'=>$request->ip(),
                'method' => $request->method(),
                'parms'=>$request->all(),
            ];
            //登录用户标记id身份
            if ($request->session()->has('aid')) {
                $log['admin_id'] =$request->session()->get('aid');
            }
            Log::channel('admin')->info('global',$log);
        }
        return $next($request);
    }
}
