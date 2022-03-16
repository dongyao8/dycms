<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //后台登录页面
    public function index(){
        //获取返回json，并解析成数组
        $data = json_decode(file_get_contents("https://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1"),true);
        //构建返回的图片信息
        $days['code'] = 1;
        $days['copyright'] = $data['images'][0]['copyright'];
        $days['images'] = 'https://www.bing.com'.$data['images'][0]['url'];
        return view('admin.login.index',compact('days'));
    }

    public function checklogin(Request $request){
        error_reporting(0);
        // 初始化
        // 接收数据
        $input = $request->only(['name', 'password']);
        if($input['name'] == "" || $input['password']==""){
            return $this->apiReturn(100,'有选项未填写完整，请检查','');
        }
        // 验证密码
        if(!ctype_alnum($input['password'])){
            return $this->apiReturn(100,'密码格式错误','');
        }
        //TODO 登录日志记录
        // 验证密码准确性
        if (Auth::guard('admin')->attempt($input)) {
            session(['aid' => Auth::guard('admin')->id()]);
            return $this->apiReturn(0);
        }else{
            return $this->apiReturn(100,'验证失败，请检查');
        }
    }
}