<?php

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

// 首页
Route::get('/', 'Index\IndexController@index')->name('index');
Route::get('/urls/{id}', 'Index\IndexController@urls');
Route::get('/links', 'Index\IndexController@links');
// 注册
Route::get('/reg/{source?}', 'Index\IndexController@reg')->where('source', '[0-9]+')->name('reg');
Route::post('/reg', 'Index\IndexController@checkReg');
// 登录
Route::get('/login', 'Index\IndexController@login')->name('login');
Route::post('/login', 'Index\IndexController@checkLogin')->middleware('throttle:20');
// 每日一文
Route::get('/daily', 'Index\IndexController@daily')->name('daily');
// 资讯信息
Route::get('/article/{id?}', 'Index\ArticleController@index')->name('article');
Route::get('/article/info/{id}', 'Index\ArticleController@show')->where('id', '[0-9]+');

// 热门关注
Route::get('/hot', 'Index\HotController@news'); //热搜榜

// 申请收录
Route::get('/shoulu', 'Index\ShouluController@index');
Route::post('/shoulu', 'Index\ShouluController@store')->middleware('auth'); //收录处理







// 用户中心
Route::middleware('auth')->group(function(){
    Route::get('/home', 'Index\HomeController@index'); //用户中心首页
    Route::post('/home', 'Index\HomeController@attendance'); //签到
    Route::get('/home/mima', 'Index\HomeController@mima'); //修改密码
    Route::post('/home/mima', 'Index\HomeController@cheangeMima')->middleware('throttle:10'); //修改密码
    // 流水日志
    Route::get('/water', 'Index\WaterController@index'); //流水日志

    
    Route::get('/home/invite', 'Index\InviteController@index'); //邀请好友

    // 文章评论
    Route::post('/comment', 'Index\CommentController@comment');
    // 用户随心笔记
    Route::resource('/note', 'Index\NoteController')->middleware('throttle:6')->only([
        'store', 'destroy'
    ]);
    // 退出登录
    Route::get('/gout', function(){
        Auth::logout();
        return redirect()->route('index');
    });
});


// 后台路由
include_once('admin.php');