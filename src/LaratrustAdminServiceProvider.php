<?php

namespace LaratrustAdmin;

use Illuminate\Support\ServiceProvider;

class LaratrustAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LaratrustAdmin');
    }

    public function register()
    {
    }
}
