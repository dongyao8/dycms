<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaterController extends Controller
{
    // 积分日志流水记录
    public function jifen($type,$uid,$amout,$content){
        // 判断用户是否存在
        $check_user = DB::table('users')->where('id',$uid)->first();
        if(!$check_user){
            return 'false';
        }
        switch ($type) {
            case "1":
                $koufei = DB::table('users')->where('id',$uid)->decrement('integral', $amout);
                break;
            case "2":
                $koufei = DB::table('users')->where('id',$uid)->increment('integral', $amout);
                break;
            default:
                $koufei = DB::table('users')->where('id',$uid)->decrement('integral', $amout);
        }
        $log['user_id'] = $uid;
        $log['type'] = $type; //type1.积分，2现金
        $log['method'] = 1; //method.1积分，2现金
        $log['integral'] = $amout;
        $log['content'] = $content;
        $log['created_at'] = date('Y-m-d H:i:s');
        $log['updated_at'] = date('Y-m-d H:i:s');
        $water_log = \App\Model\Water::insert($log);
        if($koufei && $water_log){
            return true;
        }else{
            return false;
        }
    }

    // 现金日志流水记录
    public function money($type,$uid,$amout,$content){
        // 判断用户是否存在
        $check_user = DB::table('users')->where('id',$uid)->first();
        if(!$check_user){
            return 'false';
        }
        switch ($type) {
            case "1":
                $koufei = DB::table('users')->where('id',$uid)->decrement('amount', $amout);
                break;
            case "2":
                $koufei = DB::table('users')->where('id',$uid)->increment('amount', $amout);
                break;
            default:
                $koufei = DB::table('users')->where('id',$uid)->decrement('amount', $amout);
        }
        $log['user_id'] = $uid;
        $log['type'] = $type; //type1.积分，2现金
        $log['method'] = 2; //method.1积分，2现金
        $log['integral'] = $amout;
        $log['content'] = $content;
        $log['created_at'] = date('Y-m-d H:i:s');
        $log['updated_at'] = date('Y-m-d H:i:s');
        $water_log = \App\Model\Water::insert($log);
        if($koufei && $water_log){
            return true;
        }else{
            return false;
        }
    }
}
