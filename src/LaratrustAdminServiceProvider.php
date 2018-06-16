<?php

namespace LaratrustAdmin;

use Illuminate\Support\ServiceProvider;

class LaratrustAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->publishes([
            __DIR__.'/Vendor/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
            __DIR__.'/Vendor/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminResources');

        $this->publishes([
            __DIR__.'/Vendor/config' => base_path('laratrustAdminTemp/config'),
            __DIR__.'/Vendor/routes' => base_path('laratrustAdminTemp/routes'),
            __DIR__.'/Vendor/database' => base_path('laratrustAdminTemp/database'),
            __DIR__.'/Vendor/app' => base_path('laratrustAdminTemp/app'),
        ], 'LaratrustAdminTemp');

        $this->publishes([
            __DIR__.'/Vendor/config' => base_path('laratrustAdminTemp/config'),
            __DIR__.'/Vendor/routes' => base_path('laratrustAdminTemp/routes'),
            __DIR__.'/Vendor/database' => base_path('laratrustAdminTemp/database'),
            __DIR__.'/Vendor/app' => base_path('laratrustAdminTemp/app'),
            __DIR__.'/Vendor/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
            __DIR__.'/Vendor/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminAll');

    }

    public function register()
    {
        Artisan::command('ladmin {project}', function ($project) {
            $this->info("Building {$project}!");
        })->describe('Build the project');
    }


}
