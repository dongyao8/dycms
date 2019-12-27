<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\OfficeController;

class HomeController extends Controller
{
    //管理首页
    public function index(){
        
        $new_article = \App\Model\Article::orderBy('id','desc')->limit(5)->get();
        $new_user = \App\User::orderBy('id','desc')->limit(6)->get();
        $new_comment = \App\Model\Comment::orderBy('id','desc')->limit(5)->get();

        $num['user'] = \App\User::count();
        $num['article'] = \App\Model\Article::count();
        $num['comment'] = \App\Model\Comment::count();
        $num['jifen'] = \App\Model\Water::where('method',1)->where('type',2)->sum('integral');
        return view('admin.home.index',compact('new_article','num','new_user','new_comment'));
    }

    // 清理系统缓存
    public function clean_cache(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return redirect('admin/home')->with('success_msg', '缓存清理成功');
    }

    // 导出示例
    public function exportdemo(){
        $excel = new OfficeController();
        //设置表头：
        $head = ['订单编号', '商品总数', '收货人', '联系电话', '收货地址'];
        $users = \App\User::orderBy('id','desc')->get();
        //数据中对应的字段，用于读取相应数据：
        $keys = ['id', 'name', 'email', 'source', 'active'];
        $excel->outdata('订单表', $users, $head, $keys);
        return;
    }
    // 导入示例
    public function importdemo(){
        $tmp_name = $_FILES['imgurl']['tmp_name'];
        $excel = new OfficeController();
        $info = $excel->importExecl($tmp_name);
        dd($info);
    }
}
