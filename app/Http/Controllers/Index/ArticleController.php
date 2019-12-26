<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Comment;

class ArticleController extends BaseController
{
    public function index($id=0){
        if($id==0){
            $articles = Article::orderBy('id','desc')->paginate(10);
        }else{
            $articles = Article::orderBy('id','desc')->where('category_id',$id)->paginate(10);
        }
        $categorys = \App\Model\Category::orderBy('sort','desc')->get();
        return view('index.article.index',compact('articles','categorys'));
    }
    // 文章内容展示
    public function show($id){
        $article = Article::find($id);
        // 每次访问刷新，浏览数+1
        $article->increment('views');
        $comments = Comment::where('article_id',$id)->orderBy('id','desc')->paginate(10);
        return view('index.article.show',compact('article','comments'));
    }
}
