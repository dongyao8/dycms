<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * 后台暴露路由
 */
Route::get(env('ADMIN_PREFIX', 'admin').'/login', [\App\Http\Controllers\Admin\LoginController::class, 'index'])->name(env('ADMIN_PREFIX', 'admin').'.login'); //管理后台登录页
Route::post(env('ADMIN_PREFIX', 'admin').'/login', [\App\Http\Controllers\Admin\LoginController::class, 'checklogin'])->name(env('ADMIN_PREFIX', 'admin').'.login.check'); //登录检测
