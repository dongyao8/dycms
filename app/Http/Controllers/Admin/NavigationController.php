<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Navigation;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 网址导航
    public function index(){
        $navigations = Navigation::orderBy('sort','desc')->where('status',1)->paginate(10);
        return view('admin.navigation.index',compact('navigations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = \App\Model\NavigationCategory::orderBy('sort','desc')->get();
        return view('admin.navigation.create',compact('categorys'));
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
            'navigation_category_id' => 'required|numeric',
            'url' => 'required|url',
            'sort' => 'required|numeric',
        ]);
    
        $navigation = new Navigation;
        $navigation->title= $request->title;
        $navigation->user_id= $request->title;
        $navigation->sort = $request->sort;
        $navigation->navigation_category_id = $request->navigation_category_id;
        $navigation->url = $request->url;
        $navigation->views = 0; //点击次数默认为0
        $navigation->save();
        if($navigation){
            return redirect('admin/navigation')->with('success_msg', '提交成功！');
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
    {
        $categorys = \App\Model\NavigationCategory::orderBy('sort','desc')->get();
        $navigation = Navigation::find($id);
        return view('admin.navigation.edit',compact('navigation','categorys'));
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
            'navigation_category_id' => 'required|numeric',
            'url' => 'required|url',
            'sort' => 'required|numeric',
        ]);
        $navigation = Navigation::find($id);
        $navigation->title= $request->title;
        $navigation->sort = $request->sort;
        $navigation->navigation_category_id = $request->navigation_category_id;
        $navigation->url = $request->url;
        $navigation->save();
        if($navigation){
            return redirect('admin/navigation')->with('success_msg', '修改成功');
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
        $navigation = Navigation::find($id);
        $navigation->delete();
        if($navigation){
            return back()->with('success_msg', '删除成功');
        }else{
            return back()->withInput();
        }
    }


    // 收录审核
    public function shoulu(){
        $navigations = Navigation::orderBy('sort','desc')->where('status',0)->paginate(10);
        return view('admin.navigation.shoulu',compact('navigations'));
    }
    // 收录确认
    public function inurl($id){
        $navigation = Navigation::find($id);
        $navigation->status=1;
        $navigation->save();
        if($navigation){
            return back()->with('success_msg', '审核成功');
        }else{
            return back();
        }

    }
}
