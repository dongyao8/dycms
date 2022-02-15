<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\MenuController;
use Illuminate\Http\Request;

/**
 * 主页面通用路由
 */
Route::get('main/{page}', function (Request $request) {
//主页面自动路由
    $main = "\\App\\Http\\Controllers\\Common\\" . 'MainController';
    $main = new $main;
    return $main->index($request);
})->name('home');

Route::get('body/{controller}/{action}', function ($controller, $action) {
//页面结构自动路由
    $class = "\\App\\Http\\Controllers\\Admin\\" . ucfirst(strtolower($controller)) . 'Controller';
    $body = new $class;
    return $body->$action();
});


Route::get('system', [Admin\SystemController::class, 'index'])->name('system'); //管理
Route::get('menu', [MenuController::class, 'index'])->name('menu'); //后台主菜单JSON数据

/**
 * 自定义路由路径
 */
Route::prefix('handdle')->name('handdle.')->group(function () {
    // 修改密码
    Route::prefix('safe')->name('safe.')->group(function () {
        Route::post('/', [Admin\SystemController::class, 'upmm'])->name('upmm');
    });

// 用户管理
    Route::prefix('user')->name('user.')->group(function () {
        Route::post('/educheck', [Admin\UserController::class, 'eduCheck'])->name('educheck'); //增加查询额度
        Route::get('/datalist', [Admin\UserController::class, 'datalist'])->name('datalist'); //用户数据
        Route::post('/single', [Admin\UserController::class, 'single'])->name('single'); //更新用户信息
    });

    // 报告
    Route::prefix('report')->name('report.')->group(function () {
        Route::get('/datalist', [Admin\ReportController::class, 'datalist'])->name('datalist'); //报告数据
    });

});


