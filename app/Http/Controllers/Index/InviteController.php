<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InviteController extends BaseController
{
    // 邀请好友
    public function index(){
        $friends = \App\User::where('source',Auth::id())->orderBy('id','desc')->limit(10)->get();
        return view('index.home.invite',compact('friends'));
    }
}
