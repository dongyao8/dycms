<?php

use Illuminate\Support\Facades\Route;


Route::prefix('daohang')->name('daohang.')->group(function () {

    // 路由逻辑
    Route::get('index',[\Plugins\Daohang\Controller\IndexController::class,'index']); //测试调试
    // 路由逻辑
    // Route::get('about',[\Plugins\Daohang\Controller\IndexController::class,'about']); //测试调试


});
