<?php

namespace LaratrustAdmin;

use Illuminate\Support\ServiceProvider;

class LaratrustAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
            __DIR__.'/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminResources');

        $this->publishes([
            __DIR__.'/routes' => base_path('routes/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminRoutes');

        $this->publishes([
            __DIR__.'/database' => base_path('database/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminDatabase');

        $this->publishes([
            __DIR__.'/app' => base_path('app/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminApp');

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
            __DIR__.'/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
            __DIR__.'/routes' => base_path('routes/vendor/LaratrustAdmin'),
            __DIR__.'/database' => base_path('database/vendor/LaratrustAdmin'),
            __DIR__.'/app' => base_path('app/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminAll');

    }

    public function register()
    {
    }
}
