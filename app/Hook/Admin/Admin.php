<?php
namespace App\Hook\Admin;


class Admin {
    /**
     * 管理员钩子
     * 权限或其他验证
     */
    public function auth($next,$request,$admin=null){
        /**
         * 具体执行逻辑，返回值只能是个布尔值
         * 可以加入权限，以及到期期限等约束
         * 如果已登录用户不符合条件，务必使用退出注销：Auth::guard('admin')->logout();
         * 如果是未成功登录用户，则通过重定向，返回指定位置：redirect(route(env('ADMIN_PREFIX', 'admin').'.login'));
         */
        
        







        //  继续后续操作，请勿删除
        return $next($request);
    }

}
