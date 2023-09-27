<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class MinihanddleController extends Controller
{
    //获取微信小程序操作token
    public function getToken()
    {
        error_reporting(0);
//        先判断redis是否存在
        $isHasToken = Redis::get('token');
        if ($isHasToken) {
            return $isHasToken;
        } else {
            try {
                $response = Http::get('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . env('WECHAT_APPID') . '&secret=' . env('WECHAT_SECRET'));
                $res = $response->json();
                if (!$res['access_token']) {
                    return false;
                } else {
                    Redis::set('token', $res['access_token']);
                    Redis::expire('token', $res['expires_in'] - 10);
                }
                return $res['access_token'];
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }

    }

//    查询用户信息
    public function handdle($type,$query,$key='query')
    {
        $token = $this->getToken();
        switch ($type) {
            case 'update':
                $resurl = 'https://api.weixin.qq.com/tcb/databaseupdate?access_token=';
                break;
            case 'insert':
                $resurl = 'https://api.weixin.qq.com/tcb/databaseadd?access_token=';
                break;
            case 'select':
                $resurl = 'https://api.weixin.qq.com/tcb/databasequery?access_token=';
                break;
            case 'tempfile': //获取临时外链
                $resurl = 'https://api.weixin.qq.com/tcb/batchdownloadfile?access_token=';
                break;
            default:
                return false;
        }
        $requestUrl = $resurl . $token;
        $response = Http::post($requestUrl, [
            'env' => env('WECHAT_ENV'),
            $key => $query
        ]);
        return($response->json());
    }

}
