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
        ]);
    }

    public function register()
    {
    }
}
