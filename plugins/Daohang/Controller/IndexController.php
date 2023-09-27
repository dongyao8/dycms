<?php

namespace Plugins\Daohang\Controller;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\NavigationCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //首页初始化信息
    public function index(Request $request)
    {
        $navs = NavigationCategory::where('parent_id',0)->orderBy('sort', 'desc')->get();
        $main = $this;
        return view(env('DYCMS_THEME') . '.index', compact('navs', 'main'));
    }
    //首页初始化信息
    public function about(Request $request)
    {
        return view(env('DYCMS_THEME') . '.about');
    }

    // 解析网址
    public function siteurl($url)
    {
        preg_match('/^(https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n?]+)/im', $url, $matches);
        return $matches[1] . $matches[2];
    }
}
