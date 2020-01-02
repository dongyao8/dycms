<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\SystemInfo;

class SystemInfoController extends Controller
{
    public function index(){
        $sys = SystemInfo::first();
        return view('admin.system.index',compact('sys'));
    }

    // 编辑配置修改
    public function update(Request $request){
        $validatedData = $request->validate([
            'web_title' => 'required',
            'web_logo' => 'image',
            'web_desc' => 'required',
            'web_url' => 'required|url',
        ]);

        $sys = SystemInfo::find(1);
        if ($request->hasFile('web_logo')){
            $imgpath = $request->file('web_logo')->store('sys_img/'.date('Ymd'));
            $sys['web_logo'] = $imgpath;
        }
        $sys->web_title = $request->web_title;
        $sys->web_desc = $request->web_desc;
        $sys->web_url = $request->web_url;
        $sys->tongji = $request->tongji;
        $sys->save();
        if($sys){
            return redirect('admin/system')->with('success_msg', '修改成功');
        }else{
            return back()->withInput();
        }
    }

    // 密码修改
    public function mima(){
        return view('admin.system.mima');
    }
    public function cheangeMima(Request $request){
        $validatedData = $request->validate([
            'password' => 'required',
            'password2' => 'required',
        ]);
        $aid = Auth::guard('admin')->id();
        $admin = \DB::table('admins')->where('id',$aid)->first();
        if (!Hash::check($request->password, $admin->password)) {
            // 密码不匹配…
            return back()->withErrors('原密码错误');
        }
        // 验证后修改密码
        $neword = Hash::make($request->password2);
        $changeMima = \DB::table('admins')->where('id',$aid)->update(['password'=>$neword]);
        if($changeMima){
            return back()->with('success_msg', '修改成功');
        }else{
            return back()->withErrors('系统出错');
        }

    }

}
