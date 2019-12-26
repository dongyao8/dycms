<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SystemInfo;

class SystemInfoController extends Controller
{
    public function index(){
        $sys = SystemInfo::find(1);
        if(!$sys){
            $sys = new SystemInfo;
            $sys->web_title = "我的网站";
            $sys->web_logo = "sys_img/tabler.svg";
            $sys->web_url='http://www.dongyao.ren';
            $sys->web_desc='免费开源的网站程序';
            $sys->save();
        }
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
        $sys['web_title'] = $request->web_title;
        $sys['web_desc'] = $request->web_desc;
        $sys['web_url'] = $request->web_url;
        $sys->save();
        if($sys){
            return redirect('admin/system')->with('success_msg', '修改成功');
        }else{
            return back()->withInput();
        }
    }
}
