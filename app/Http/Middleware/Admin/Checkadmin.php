<?php

namespace App\Http\Middleware\Admin;

use App\Hook\Admin\Admin as AdminAdmin;
use App\Hook\Admin\Login;
use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkadmin
{
    /**
     * 后台管理员请求中间件
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        // 判断登录信息
        if (!Auth::guard('admin')->check()) {

            return redirect(route('admin.login'));
        }else{
	        $admin = Admin::find(Auth::guard('admin')->id());
			if(!$admin){
				echo '账号不存在';
				Auth::guard('admin')->logout();
				return redirect(route('admin.login'));

			}else{
				$request->merge(['aid' => Auth::guard('admin')->id()]); //admin 合并进去
                //引入钩子，可以加入权限，以及到期期限等约束
                $hook = new AdminAdmin;
                return $hook->auth($next,$request,Auth::guard('admin')->user());
			}
        }

    }
}
