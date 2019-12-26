<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index(){
        
        return view('admin.index');
    }

    // 管理员验证
    public function check_admin(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:150',
            'password' => 'required|min:6',
        ]);
        $admin['name'] = $request->name;
        $admin['password'] = $request->password;
        //验证登录
        if (Auth::guard('admin')->attempt($admin)) {
            //验证处于激活状态，并且存在的用户
            return redirect()->action('Admin\HomeController@index');
        }else{
            return back()->withInput()->withErrors('登录信息错误');
        }
    }
}
