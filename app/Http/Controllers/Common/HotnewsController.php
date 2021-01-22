<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HotnewsController extends Controller
{
    // 获取热搜数据
    function get_hotNews(){
        \error_reporting(0);
        if (Cache::has('hot_news')) {
            $hot_news = Cache::get('hot_news');
            $hot_list = \json_decode($hot_news,1);
        }else{
            $hot_data = file_get_contents('https://yiban.io/api/hot_search/record/list?platform=weibo_hot');
            $hot_list = json_decode($hot_data,1);
            if(!is_array($hot_list)){
                return ['code'=>0,'msg'=>'服务出错'];
            }else if($hot_list['status_code'] != 200){

                return ['code'=>0,'msg'=>'服务出错2'];
            }else{
                Cache::put('hot_news', $hot_data);
            }
        }
        // 每半小时更新一次热搜
        if(time() - $hot_list['update_at'] >= 2000){
            $hot_data = file_get_contents('https://yiban.io/api/hot_search/record/list?platform=weibo_hot');
            $hot_list = json_decode($hot_data,1);
            if(!is_array($hot_list)){
                return ['code'=>0,'msg'=>'服务出错'];
            }else if($hot_list['status_code'] != 200){

                return ['code'=>0,'msg'=>'服务出错2'];
            }else{
                Cache::put('hot_news', $hot_data);
            }
        }

        // 返回最新数据
        return $hot_list;
    }



}
