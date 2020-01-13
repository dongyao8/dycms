<?php

namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterController extends BaseController
{
    public function index(){
        $datas = \App\Model\Water::orderBy('id','desc')->where('user_id',Auth::id())->paginate(10);
        return view('index.water.index',compact('datas'));
    }
}
