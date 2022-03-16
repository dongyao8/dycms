<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //API接口返回格式化
    public function apiReturn($code=0,$msg='success',$data=[]){
        return response()->json([
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ]);
    }
}
