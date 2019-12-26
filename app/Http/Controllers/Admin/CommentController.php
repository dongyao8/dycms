<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // 评论列表
    public function index(){
        $comments = \App\Model\Comment::orderBy('id','desc')->paginate(10);
        return view('admin.comment.index',compact('comments'));
    }
    // 删除评论
    public function delete($id){
        $comm = \App\Model\Comment::find($id);
        $comm->delete();
        if($comm){
            return redirect('admin/comment')->with('success_msg', '删除成功');
        }else{
            return back();
        }
    }
}
