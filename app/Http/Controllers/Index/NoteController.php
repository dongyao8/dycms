<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Note;
use App\Http\Controllers\Common\WaterController;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * 用户笔记
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'notes' => 'required|min:1|max:500',
        ]);
        $note = new Note;
        $note->notes = strip_tags( $request->notes);
        $note->user_id = Auth::id();
        $note->save();
        if($note){
            // 发表随笔增加积分
            $score = config('score.note');
            $water = new WaterController();
            $water->jifen('2',Auth::id(),$score,'随笔积分奖励');
            return back()->with('success_msg', '发布成功，奖励积分:'.$score."分");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
