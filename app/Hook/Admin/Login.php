<?php
namespace App\Hook\Admin;

use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Bool_;

class Login extends Controller{
    /**
     * 登录前钩子
     * 后台登录钩子
     */
    public function login_before($request){
        /**
         * 具体执行逻辑，返回值只能是个布尔值
         * 一般用于验证账号密码前的参数过滤，或者验证码加强验证等
         * apiReturn code=0 为通过，不为0则为不通过，return ['status'=>500,'msg'=>'验证码错误'];
         */

         

         return ['status'=>0,'msg'=>'success'];
    }

    /**
     * 登录后钩子
     * $data 是已验证的登录用户信息 array
     */
    public function login_after($request,$data=null){

        // if($data->id == 1){
        //     return ['status'=>300,'msg'=>'比如通过这种方式拦截ID=1的后台登录'];
        // }
        
        return ['status'=>0,'msg'=>'success'];
    }
}
