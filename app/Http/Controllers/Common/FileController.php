<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //文件上传处理
    public function upfile(Request  $request)
    {
        $file = $request->file('file');
        $tmpname = md5(uniqid()); // 生成一个唯一的随机名称...
        $extension = $file->getClientOriginalExtension(); // 根据文件的 MIME 类型确定文件的扩展名...
        $path = $request->input('path');
        $path = $request->file('file')->storeAs($path . '/' . date('Y-m-d'), $tmpname.'.'.$extension,'public');
        $res['status'] = 0;
        $res['msg'] = 'success';
        $res['data']['value'] = $path;
        return $res;
    }
}
