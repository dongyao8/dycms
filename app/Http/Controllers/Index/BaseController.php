<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Model\Link;
use App\Model\Article;

class BaseController extends Controller
{
    // 首页公共参数
    public function __construct()
    {
        $links = Link::orderBy('sort','desc')->limit(7)->get(); //友情链接
        $main_article = Article::orderBy('id','desc')->where('is_hot',1)->limit(6)->get(); //推荐文章
        $hot_article = Article::orderBy('views','desc')->limit(6)->get(); //热门点击
        View::share(compact('links','main_article','hot_article'));
        
    }
}
