<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Model\Link;
use App\Model\Article;

class BaseController extends Controller
{
    // 首页公共参数
    public function __construct()
    {
        // 友情链接缓存
        if (Cache::has('links')) {
            $links = json_decode(Cache::get('links'));
        }else{
            $links = Link::orderBy('sort','desc')->limit(7)->get(); //友情链接
            $cache_links = Cache::put('links', json_encode($links),config('system.cache_time')*60);
        }
        // 推荐文章缓存
        if (Cache::has('main_article')) {
            $main_article = json_decode(Cache::get('main_article'));
        }else{
            $main_article = Article::orderBy('id','desc')->where('is_hot',1)->limit(6)->get(); //推荐文章
            $cache_main_article = Cache::put('main_article', json_encode($main_article),config('system.cache_time')*60);
        }
        // 热门点击缓存
        if (Cache::has('hot_article')) {
            $hot_article = json_decode(Cache::get('hot_article'));
        }else{
            $hot_article = Article::orderBy('views','desc')->limit(6)->get(); //热门点击
            $cache_hot_article = Cache::put('hot_article', json_encode($hot_article),config('system.cache_time')*60);
        }
        View::share(compact('links','main_article','hot_article'));
        
    }
}
