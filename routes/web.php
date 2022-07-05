<?php
use Illuminate\Http\Request;
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


Route::get('/', function (Request $request) {
    $index = '\\Plugins\\'.ucfirst(strtolower(env('DYCMS_THEME', 'daohang'))).'\\Controller\\IndexController';
    $index = new $index;
    return $index->index($request);
});

Route::get('/test',[\App\Http\Controllers\TestController::class,'test']); //测试调试

Route::fallback(function (){
    return view('default.404');
});

/**
 * 后台暴露路由
 */
Route::get(env('ADMIN_PREFIX', 'admin').'/login', [\App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login'); //管理后台登录页
Route::post(env('ADMIN_PREFIX', 'admin').'/login', [\App\Http\Controllers\Admin\LoginController::class, 'checklogin'])->name('admin.login.check')->middleware('adminlog'); //登录检测

// 自动加载插件前端路由
Route::prefix('plugins')->name('plugins.')->group(function () {
    //START 动态加载插件路由
    $pluginRoute = 'web.php';
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