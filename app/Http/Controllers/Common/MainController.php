<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use function view;

class MainController extends Controller
{
    //主页面
    public function index(){
        return view('admin.home.index');
    }

    //子页面
    public function son($data){
        $data = json_encode($data);
        return view('admin.home.son',compact('data'));
    }
}
