<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Comment;
use App\Http\Controllers\Common\WaterController;

class CommentController extends Controller
{
    //新增评论
    public function comment(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'c_content' => 'required|min:10|max:500',
        ]);
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->article_id = decrypt($request->id);
        $comment->c_content = strip_tags($request->c_content);
        $comment->save();
        if($comment){
            // 发表评论增加积分
            $score = config('score.comment');
            $water = new WaterController();
            $water->jifen('2',Auth::id(),$score,'文章评论奖励');
            return back()->with('success_msg', '发布成功，奖励积分:'.$score."分");
        }else{
            return back()->withInput();
        }

    }
}
