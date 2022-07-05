<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\LogsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    //测试控制器
    public function test(){

        dd( ucfirst(strtolower('hahaha')));

    }
}
