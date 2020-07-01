<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\HotnewsController;

class HotController  extends BaseController
{
    // 热点关注
    public function news(){
        $news = new HotnewsController();
        $news_data = $news->get_hotNews();
        // $news_data = $news_list['hot_search_list'];
        return view('index.hot.news',compact('news_data'));
    }
}
