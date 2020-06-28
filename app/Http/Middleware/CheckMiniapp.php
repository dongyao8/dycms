<?php

namespace App\Http\Middleware;

use Closure;

class CheckMiniapp
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
        if ($request->token != \env('WECHAT_MINIAPP_KEY') || !\env('WECHAT_SWITCH')) {
            return response()->json(['code'=>0,'msg'=>'非法请求']);
        }else{
            return $next($request);
        }
    }
}
