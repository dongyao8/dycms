<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    //积分余额流水
    public function index(){
        return view('index.water.index');
    }
    
}
