<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 小程序接口
Route::prefix('miniapp')->middleware('throttle:30','checkminiapp')->group(function(){
    Route::get('/article/{id?}', 'Api\ArticleController@index');  //文章数据列表
    Route::get('/article/category/list', 'Api\ArticleController@category');  //文章分类列表
    Route::get('/article/info/{id}', 'Api\ArticleController@show')->where('id', '[0-9]+');  //文章内容
    Route::get('/article/comment/{id}', 'Api\ArticleController@comment')->where('id', '[0-9]+');  //文章评论列表
});