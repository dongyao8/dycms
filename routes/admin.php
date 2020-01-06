<?php

// 用户中心
Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::get('/', 'IndexController@index'); //管理员登录页
    Route::get('/clean', 'HomeController@clean_cache'); //清理缓存
    Route::post('/', 'IndexController@check_admin')->middleware('throttle:10'); //管理员验证

    // 后台权限
    Route::middleware('auth:admin', 'throttle:40')->group(function(){
        Route::get('/home', 'HomeController@index')->name('admin'); //管理首页
        Route::resource('/category', 'CategoryController');  //文章分类
        Route::resource('/daohang', 'NavigationCategoryController');  //导航分类
        Route::resource('/navigation', 'NavigationController');  //导航网址
        Route::get('/shoulu', 'NavigationController@shoulu'); //收录审核
        Route::get('/shoulu/inurl/{id}', 'NavigationController@inurl'); //收录审核
        Route::resource('/article', 'ArticleController');  //文章管理
        Route::resource('/majorlink', 'MajorLinkController');  //推荐网址管理
        Route::resource('/link', 'LinkController');  //友情链接

        // 修改密码
        Route::get('/mima', 'SystemInfoController@mima'); //修改密码
        Route::post('/mima', 'SystemInfoController@cheangeMima'); //修改密码


        // 评论管理
        Route::get('/comment', 'CommentController@index'); //评论列表
        Route::get('/comment/delete/{id}', 'CommentController@delete'); //删除评论

        // 系统设置
        Route::get('/system', 'SystemInfoController@index'); //系统配置
        Route::post('/system', 'SystemInfoController@update'); //配置逻辑


        Route::get('/user', 'UserController@index');  //用户列表
        Route::get('/user/operate/{id}/{active}', 'UserController@operate');  //冻结用户
        // 退出登录
        Route::get('/gout', function(){
            Auth::guard('admin')->logout();
            return redirect('/');
        });
    });
});