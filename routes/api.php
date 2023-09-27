<?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

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

    //START API动态加载插件路由
    $pluginRoute = 'api.php';
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
