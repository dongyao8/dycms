<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * API接口返回格式化
     *
     * @param $status int 状态码
     * @param $msg string 描述说明
     * @param $data array 接口返回数据
     * @param $state string 状态字段说明，部分接口需求状态码字段为status,有的又是code
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiReturn($status = 0, $msg = 'success', $data = [], $state = 'status')
    {
        return response()->json([
            $state => $status,
            'msg' => $msg,
            'data' => $data
        ]);
    }

    // 日志记录
    /**
     * dir 日志目录
     * type 日志类型：emergency、 alert、 critical、 error、 warning、 notice、 info 和 debug
     * content 日志内容
     */
    public function addLogs($dir, $type, $content)
    {
        Log::build([
            'driver' => 'daily',
            'path' => storage_path('logs/' . $dir . '/' . $type . '.log'),
        ])->$type($content);
    }
}
