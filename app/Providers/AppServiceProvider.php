<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //定义全局视图资源路径
        View()->share('dycms_static',  asset('static').'/'.env('TEMPLATE_NAME', 'dycms').'/');
    }
}
