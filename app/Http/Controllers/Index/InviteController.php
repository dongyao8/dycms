<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InviteController extends BaseController
{
    // 邀请好友
    public function index(){
        return view('index.home.invite');
    }
}
