<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Common\WaterController;
use App\Model\Note;

class HomeController extends BaseController
{
    
    // 用户中心
    public function index(){
        // $water = new WaterController();
        // $water->money('2','3','1','测试积分');
        $note = \App\Model\Note::where('user_id',Auth::id())->orderBy('id','desc')->paginate(10);
        return view('index.home.index',compact('note'));
    }

    // 密码修改
    public function mima(){
        return view('index.home.mima');
    }
    public function cheangeMima(Request $request){
        $validatedData = $request->validate([
            'password' => 'required',
            'password2' => 'required',
        ]);
        $uid = Auth::id();
        $info['id'] = $uid;
        $info['password'] = $request->password;
        if (Auth::attempt($info)) {
            $user = \App\User::find($uid);
            $user->password = Hash::make($request->password2);
            $user = $user->save();
            if($user){
                return back()->with('success_msg', '修改成功');
            }else{
                return back()->withErrors('系统出错');
            }
        }else{
            return back()->withErrors('旧密码错误');
        }

    }
}
