<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Navigation;

class ShouluController extends BaseController
{
    // 收录申请页面
    public function index(){
        $categorys = \App\Model\NavigationCategory::orderBy('sort','desc')->get();
        return view('index.shoulu.index',compact('categorys'));
    }
    // 收录处理
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'navigation_category_id' => 'required|numeric',
            'url' => 'required|url',
        ]);
        
        $navigation = new Navigation;
        $navigation->title= $request->title;
        $navigation->navigation_category_id = $request->navigation_category_id;
        $navigation->url = $request->url;
        $navigation->status = 0; //申请默认待审核
        $navigation->views = 0; //点击次数默认为0
        $navigation->user_id = Auth::id();; //申请人ID
        $navigation->save();
        if($navigation){
            return back()->with('success_msg', '提交成功,等待管理员审核！');
        }else{
            return back()->withInput();
        }
    }
}
