<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Common\WaterController;
use Illuminate\Http\Request;
use App\User;

class IndexController extends BaseController
{
    public function index(){
        // 热门推荐缓存
        if (Cache::has('majors')) {
            $majors = json_decode(Cache::get('majors'));
        }else{
            $majors = \App\Model\MajorLink::orderBy('sort','desc')->get();
            $cache_majors = Cache::put('majors', json_encode($majors),config('system.cache_time')*60);
        }
        // 导航缓存
        if (Cache::has('navigations')) {
            $navigations = json_decode(Cache::get('navigations'));
        }else{
            $navigations = \App\Model\NavigationCategory::orderBy('sort','desc')->get();
            $cache_navigations = Cache::put('navigations', json_encode($navigations),config('system.cache_time')*60);
        }
        // 首页内容
        return view('welcome',compact('navigations','majors'));
    }
    // 导航详情
    public function urls($id){
        $navigations = \App\Model\Navigation::where('navigation_category_id',$id)->where('status',1)->orderBy('sort','desc')->get();
        $nav_name = \App\Model\NavigationCategory::find($id);
        return view('index.index.urls',compact('navigations','nav_name'));
    }
    // 友情链接详情
    public function links(){
        $links = \App\Model\Link::orderBy('sort','desc')->get();
        return view('index.index.links',compact('links'));
    }

    public function reg($source=0){
        if($source!=0){
            Cookie::queue('source', $source, 60);
        }else{
            if(Cookie::get('source')=="" || Cookie::get('source')==null){
                Cookie::queue('source', 0, 60);
            }
        }
        return view('index.index.reg');
    }

    public function login(){
        return view('index.index.login');
    }
    // 每日一文
    public function daily(){
        // 接口调用
        $api_url = "https://interface.meiriyiwen.com/article/random";
        $api_con = file_get_contents($api_url);
        $api_con = json_decode($api_con,1);
        return view('index.index.daily',['article'=>$api_con]);
    }

    // 注册用户验证
    public function checkReg(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:users|min:3|max:150',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        // 验证邮箱格式
        if(!filter_var($request->email,FILTER_VALIDATE_EMAIL)){
            return back()->withInput()->withErrors('邮箱地址错误');
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = 'head_img/user.png'; //默认头像
        $user->password = Hash::make($request->password);
        $user->active = 1; //默认用户状态为1
        $user->amount = 0; //默认余额为0
        $user->integral = 0; //默认用户积分为0
        // 邀请用户判断
        $father_id = Cookie::get('source');
        if($father_id=="" || $father_id==null || $father_id==0){
            $user->source = 0;
        }else{
            $user->source = $father_id;
        }
        //添加用户
        $add_user = $user->save();
        if($add_user){
            if($father_id!=0){
                // 邀请好友上级奖励
                $score = config('score.invite');
                $water = new WaterController();
                $water->jifen('2',$father_id,$score,'邀请好友奖励，ID:'.$request->name);
            }
            return redirect('login')->with('success_msg', '注册成功，请登录！');
        }else{
            return back()->withInput();
        }
    }

    // 登录用户验证
    public function checkLogin(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:150',
            'password' => 'required|min:6',
        ]);
        $user['name'] = $request->name;
        $user['password'] = $request->password;
        $user['active'] = 1;
        //验证登录
        if (Auth::attempt($user,true)) {
            //验证处于激活状态，并且存在的用户
            return redirect()->action('Index\HomeController@index');
        }else{
            return back()->withInput()->withErrors('登录信息错误');
        }
    }

}
