<?php

namespace Plugins\Daohang\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //首页初始化信息
    public function index(Request $request)
    {
       return view(env('DYCMS_THEME').'.index');
    }
}
