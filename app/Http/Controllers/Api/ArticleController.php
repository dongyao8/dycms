<?php
// 用于微信小程序的部分数据接口调用
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;

class ArticleController extends Controller
{

    // 文章列表 : /api/miniapp/article/1
    public function index($id=0){
        if($id==0){
            $articles = Article::orderBy('id','desc')->select('id', 'title', 'imgurl','category_id','status','is_hot','views','created_at')->paginate(10);
        }else{
            $articles = Article::orderBy('id','desc')->where('category_id',$id)->paginate(10);
        }
        return response()->json($articles);
    }

    // 文章分类列表 : /api/miniapp/article/category/list
    public function category(){
        $categorys = \App\Model\Category::orderBy('sort','desc')->get();
        return response()->json($categorys);

    }

    // 文章内容展示 ： /api/miniapp/article/info/1
    public function show($id){
        $article = Article::find($id);
        // 每次访问刷新，浏览数+1
        $article->increment('views');
        return response()->json($article);
    }

    // 文章评论列表 : /api/miniapp/article/comment/1
    public function comment($id){
        $comments = \App\Model\Comment::where('article_id',$id)->orderBy('id','desc')->paginate(10);
        return response()->json($comments);
    }
}
