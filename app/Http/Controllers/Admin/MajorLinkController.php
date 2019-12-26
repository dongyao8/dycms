<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MajorLink;

class MajorLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = MajorLink::orderBy('id','desc')->paginate(10);
        return view('admin.majorlink.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = \App\Model\Category::orderBy('sort','desc')->get();
        return view('admin.majorlink.create',compact('categorys'));
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
            'url' => 'required|url',
            'sort' => 'required|numeric',
        ]);
        $imgpath = $request->file('imgurl')->store('logo_img/'.date('Ymd'));
        $major = new MajorLink;
        $major->title= $request->title;
        $major->url = $request->url;
        $major->sort = $request->sort;
        $major->imgurl = $imgpath;
        $major->save();
        if($major){
            return redirect('admin/majorlink')->with('success_msg', '发布成功');
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
        $majors = MajorLink::find($id);
        return view('admin.majorlink.edit',compact('majors'));
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
            'url' => 'required|url',
            'sort' => 'required|numeric',
        ]);
        $major = MajorLink::find($id);
        if ($request->hasFile('imgurl')){
            $imgpath = $request->file('imgurl')->store('logo_img/'.date('Ymd'));
            $major->imgurl = $imgpath;
        }
        $major->title= $request->title;
        $major->url = $request->url;
        $major->sort = $request->sort;
        $major->save();
        if($major){
            return redirect('admin/majorlink')->with('success_msg', '修改成功');
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
        $major = MajorLink::find($id);
        $major->delete();
        if($major){
            return redirect('admin/majorlink')->with('success_msg', '删除成功');
        }else{
            return back()->withInput();
        }
    }
}
