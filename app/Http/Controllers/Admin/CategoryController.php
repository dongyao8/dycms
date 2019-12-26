<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 链接列表
    public function index(){
        $categorys = Category::orderBy('sort','desc')->paginate(10);
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'c_title' => 'required|max:200',
            'sort' => 'required|numeric',
        ]);
    
        $category = new Category;
        $category['c_title'] = $request->c_title;
        $category['sort'] = $request->sort;
        $category->save();
        if($category){
            return redirect('admin/category')->with('success_msg', '提交成功！');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {;
        return view('admin.category.edit',['category'=>Category::find($id)]);
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
            'c_title' => 'required|max:200',
            'sort' => 'required|numeric',
        ]);
    
        $category = Category::find($id);
        $category['c_title'] = $request->c_title;
        $category['sort'] = $request->sort;
        $category->save();
        if($category){
            return redirect('admin/category')->with('success_msg', '修改成功');
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
        $is_null = \App\Model\Article::where('category_id',$id)->count();
        if($is_null != 0){
            return back()->withInput()->withErrors('该栏目下存在'.$is_null.'篇文章内容，无法删除目录！');
        }
        $category = Category::find($id);
        $category->delete();
        if($category){
            return redirect('admin/category')->with('success_msg', '删除成功');
        }else{
            return back()->withInput();
        }
    }
}
