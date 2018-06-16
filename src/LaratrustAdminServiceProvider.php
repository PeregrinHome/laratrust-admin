<?php

namespace LaratrustAdmin;

use Illuminate\Support\ServiceProvider;

class LaratrustAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LaratrustAdmin');

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminViews');

        $this->publishes([
            __DIR__.'/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminAssets');

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
            __DIR__.'/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminAll');

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    public function register()
    {
    }
}
