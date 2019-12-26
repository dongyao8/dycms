<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NavigationCategory;
class NavigationCategoryController extends Controller
{
    // 导航分类列表
    public function index(){
        $categorys = NavigationCategory::orderBy('sort','desc')->paginate(10);
        return view('admin.navigationcategory.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navigationcategory.create');
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
            'name' => 'required|max:200',
            'sort' => 'required|numeric',
        ]);
    
        $category = new NavigationCategory;
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->save();
        if($category){
            return redirect('admin/daohang')->with('success_msg', '提交成功！');
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
        return view('admin.navigationcategory.edit',['navigationcategory'=>NavigationCategory::find($id)]);
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
            'name' => 'required|max:200',
            'sort' => 'required|numeric',
        ]);
        $category = NavigationCategory::find($id);
        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->save();
        if($category){
            return redirect('admin/daohang')->with('success_msg', '修改成功');
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
        $is_null = \App\Model\Navigation::where('navigation_category_id',$id)->count();
        if($is_null != 0){
            return back()->withInput()->withErrors('该栏目下存在'.$is_null.'篇文章内容，无法删除目录！');
        }
        $category = NavigationCategory::find($id);
        $category->delete();
        if($category){
            return redirect('admin/daohang')->with('success_msg', '删除成功');
        }else{
            return back()->withInput();
        }
    }
}
