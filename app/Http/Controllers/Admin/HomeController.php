<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //首页
    public function body()
    {
        $body[] = [
            'type' => 'card',
            'header' => [
                'title' => '欢迎访问DYCMS后台管理系统',
                'subTitle' => '首页内容'
            ]
        ];

        $data = [
            'type' => 'page',
            'title' => '控制台面板',
            'body' => $body,
        ];
        return $data;
    }
}
