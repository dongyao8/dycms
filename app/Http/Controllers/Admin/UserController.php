<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // 用户列表
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    // 控制用户状态
    public function operate($id,$active){
        $operate = User::find($id);
        if($active!=1){
            $operate->active = 1;
        }else{
            $operate->active = 0;
        }
        $operate = $operate->save();
        if($operate){
            return back()->with('success_msg', '修改成功');
        }else{
            return back();
        }
    }
}
