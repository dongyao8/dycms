<?php

namespace App\Http\Controllers;

use App\Hook\Admin\Login;
use App\Http\Controllers\Common\LogsController;
use App\Http\Controllers\Common\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    //测试控制器
    public function test(){
        dd(false);

    }
}
