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
        $note = \App\Model\Note::where('user_id',Auth::id())->orderBy('id','desc')->paginate(10);
        return view('index.home.index',compact('note'));
    }

    // 签到
    public function attendance(Request $request){
        $data = \App\Model\Attendance::where('user_id',Auth::id())->whereDate('created_at', date('Y-m-d'))->first();
        if($data){
            return back()->withErrors('您今天已经签过了，请明天再来');
        }else{
            // 添加签到记录
            $att = new \App\Model\Attendance();
            $att->user_id = Auth::id();
            $att->save();
            // 积分奖励
            $score = config('score.attendance');
            $water = new WaterController();
            $water->jifen('2',Auth::id(),$score,'签到奖励');
            return back()->with('success_msg', '签到成功,奖励+'.$score."分");
        }
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
