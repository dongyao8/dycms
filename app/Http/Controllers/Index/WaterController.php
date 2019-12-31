<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterController extends BaseController
{
    public function index(){
        $datas = \App\Model\Water::orderBy('id','desc')->paginate(10);
        return view('index.water.index',compact('datas'));
    }
}
