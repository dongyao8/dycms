<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkadmin
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
        // 暂时屏蔽
        if (!Auth::guard('admin')->check()) {

            return redirect(route(env('ADMIN_PREFIX', 'admin').'.login'));
        }else{
            //检查管理员是否到期权限等
	        $admin = Admin::find(Auth::guard('admin')->id());
			if(!$admin){
				echo '账号不存在';
				Auth::guard('admin')->logout();
				return redirect(route(env('ADMIN_PREFIX', 'admin').'.login'));

			}else{
				$request->merge(['aid' => Auth::guard('admin')->id()]); //admin 合并进去
				return $next($request);
			}
        }

    }
}
