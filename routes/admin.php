<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\MenuController;
use App\Http\Controllers\Common\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 入口页面路由
 */
Route::get('main/{page}', function (Request $request) {
    //主页面自动路由
    $main = "\\App\\Http\\Controllers\\Common\\" . 'MainController';
    $main = new $main;
    return $main->index($request);
})->name('home');

/**
 * /页面body体万能路:案例-：handdle/action/body
 */


Route::any('handdle/{controller}/{action}', function ($controller, $action, Request $request) {
    //页面结构自动路由
    $class = "\\App\\Http\\Controllers\\Admin\\" . ucfirst(strtolower($controller)) . 'Controller';
    $body = new $class;
    return $body->$action($request);
});


Route::get('system', [Admin\SystemController::class, 'index'])->name('system'); //管理
Route::get('menu', [MenuController::class, 'index'])->name('menu'); //后台主菜单JSON数据
Route::post('upfile', [FileController::class, 'upfile'])->name('upfile'); //上传文件-封面小图
Route::post('attachment', [FileController::class, 'attachment'])->name('attachment'); //上传附件，正文内容
//退出登录
Route::get('gout', function () {
    Auth::guard('admin')->logout();
    return redirect(route('admin.gout'));
})->name('gout'); //后台主菜单JSON数据


// 自动加载插件后台路由
Route::prefix('plugins')->name('plugins.')->group(function () {
    //START 动态加载插件路由
    $pluginRoute = 'admin.php';
    $folder = 'routes';
    $rootpath = base_path();
    //拼接插件路由文件夹
    $plgins = $rootpath . '/' . 'plugins/';
    foreach (scandir($plgins) as $file) {
        // 只处理文件夹内容
        if (is_dir($plgins . $file)) {
            //    屏蔽隐藏文件夹
            if ($file != "." && $file != "..") {
                //    判断文件存在，并加载
                $fullPath = $plgins . $file . '/' . $folder . '/' . $pluginRoute;
                if (file_exists($fullPath)) {
                    require($fullPath); //引入指定文件
                }
            }
        }
    }
    // END 动态加载路由
});
