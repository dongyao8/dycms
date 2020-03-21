<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;
use App\Http\Controllers\OfficeController;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(10);
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = \App\Model\Category::orderBy('sort','desc')->get();
        return view('admin.article.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'imgurl' => 'required|image',
            'category_id' => 'required|numeric',
            'content' => 'required',
            'is_hot' => 'required|numeric',
        ]);
        $imgpath = $request->file('imgurl')->store('ar_img/'.date('Ymd'));
        $article = new Article;
        $article->title= $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request->content;
        $article->is_hot = $request->is_hot;
        $article->imgurl = $imgpath;
        $article->status = 1;  //默认直接通过
        $article->views = 0;  //默认阅读量为0
        $article->save();
        if($article){
            return redirect('admin/article')->with('success_msg', '发布成功');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = \App\Model\Category::orderBy('sort','desc')->get();
        $article = Article::find($id);
        return view('admin.article.edit',compact('article','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'imgurl' => 'image',
            'category_id' => 'required|numeric',
            'content' => 'required',
            'is_hot' => 'required|numeric',
        ]);
        $article = Article::find($id);
        if ($request->hasFile('imgurl')){
            $imgpath = $request->file('imgurl')->store('ar_img/'.date('Ymd'));
            $article->imgurl = $imgpath;
        }
        $article->title= $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request->content;
        $article->is_hot = $request->is_hot;
        $article->save();
        if($article){
            return redirect('admin/article')->with('success_msg', '修改成功');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        if($article){
            return redirect('admin/article')->with('success_msg', '删除成功');
        }else{
            return back()->withInput();
        }
    }

    // 文章内容图片插件
    public function conImg(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|image',
        ]);
        $imgpath = $request->file('file')->store('con_img/'.date('Ymd'));
        return response()->json(['location' => $imgpath]);
    }
}
