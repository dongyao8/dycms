<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 链接列表
    public function index(){
        $links = Link::orderBy('sort','desc')->paginate(10);
        return view('admin.link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
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
            'url' => 'required|url|unique:links',
            'sort' => 'required|numeric',
        ]);
    
        $link = new Link;
        $link['title'] = $request->title;
        $link['url'] = $request->url;
        $link['sort'] = $request->sort;
        $link->save();
        if($link){
            return redirect('admin/link')->with('success_msg', '提交成功！');
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
        return view('admin.link.edit',['link'=>Link::find($id)]);
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
            'url' => 'required|url',
            'sort' => 'required|numeric',
        ]);
    
        $link = Link::find($id);
        $link['title'] = $request->title;
        $link['url'] = $request->url;
        $link['sort'] = $request->sort;
        $link->save();
        if($link){
            return redirect('admin/link')->with('success_msg', '修改成功');
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
        $link = Link::find($id);
        $link->delete();
        if($link){
            return redirect('admin/link')->with('success_msg', '删除成功');
        }else{
            return back()->withInput();
        }
    }
}
