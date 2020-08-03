<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('DB_HOST')){
            Schema::defaultStringLength(191);
            if(Schema::hasTable('system_infos')){
                // 系统配置
                if (Cache::has('sys_info')) {
                    $sys_info = json_decode(Cache::get('sys_info'));
                }else{
                    $sys_info = \App\Model\SystemInfo::find(1);
                    $cache_sys_info = Cache::put('sys_info', json_encode($sys_info),config('system.cache_time')*60);
                }
                View::share(compact('sys_info'));
            }
        }
        
    }
}
