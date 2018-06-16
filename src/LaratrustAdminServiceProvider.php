<?php

namespace LaratrustAdmin;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

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
        ], 'LaratrustAdminTempSetting');

        $this->publishes([
            __DIR__.'/Vendor/config' => base_path('laratrustAdminTemp/config'),
            __DIR__.'/Vendor/routes' => base_path('laratrustAdminTemp/routes'),
            __DIR__.'/Vendor/database' => base_path('laratrustAdminTemp/database'),
            __DIR__.'/Vendor/app' => base_path('laratrustAdminTemp/app'),
            __DIR__.'/Vendor/resources/views' => base_path('resources/views/vendor/LaratrustAdmin'),
            __DIR__.'/Vendor/resources/assets' => base_path('resources/assets/vendor/LaratrustAdmin'),
        ], 'LaratrustAdminAll');

        $this->publishes([
            __DIR__.'/Vendor/resources/views' => base_path('resources/views'),
            __DIR__.'/Vendor/resources/assets' => base_path('resources/assets'),
        ], 'LaratrustAdminReplaceViews');

        $this->publishes([
            __DIR__.'/Vendor/app/Http/Controllers' => base_path('app/Http/Controllers'),
        ], 'LaratrustAdminReplaceControllers');

        $this->publishes([
            __DIR__.'/Vendor/app/Models' => base_path('app/Models'),
        ], 'LaratrustAdminReplaceModels');

    }

    public function register()
    {
        Artisan::command('ladmin:init', function () {
            $this->info("LaratrustAdmin Initialization");
            $cmd = 'php artisan make:auth';
            $cmd .= ' && php artisan ladmin:routes';
            $cmd .= ' && php artisan ladmin:install';
            $cmd .= ' && php artisan ladmin:publish:laratrust';
            $cmd .= ' && php artisan ladmin:files:delete';
            $cmd .= ' && php artisan ladmin:publish:admin';
            $cmd .= ' && php artisan ladmin:publish:temp';
            $cmd .= ' && composer dump-autoload';
            system($cmd);
        });
        Artisan::command('ladmin:routes', function () {
            $this->info("LaratrustAdmin Add Routes");
            $web = File::get(base_path('routes/web.php'));
            $routes = File::get(__DIR__.'/Sources/routes.php');
            $content = $web.$routes;
            File::put(base_path('routes/web.php'), $content);
        });
        Artisan::command('ladmin:auth', function () {
            $this->info("LaratrustAdmin Auth");
            $cmd = 'php artisan make:auth';
            system($cmd);
        });
        Artisan::command('ladmin:migration', function () {
            $this->info("LaratrustAdmin Migration");
            $file = File::glob(base_path('database/migrations/*create_users_table.php'));
            if(!empty($file)){
                File::delete($file[0]);
            }
            $date = date('Y_m_d_His');
            $migration_path = database_path("migrations/${date}_create_users_table.php");
            File::copy(__DIR__.'/Sources/migrations/create_users_table.php', $migration_path);
        });
        Artisan::command('ladmin:files:delete', function () {
            $this->info("LaratrustAdmin Delete Files");
            File::deleteDirectory(base_path('app/Http/Controllers/Auth'));
            File::deleteDirectory(base_path('resources/views/auth'));
            File::delete([
                base_path('app/Permission.php'),
                base_path('app/Role.php'),
                base_path('app/User.php')
            ]);
        });
        Artisan::command('ladmin:install', function () {
            $this->info("LaratrustAdmin Install");
            $cmd = 'composer require "santigarcor/laratrust:5.0.*"';
            $cmd .= ' && composer require "laravelcollective/html":"^5.4.0"';
            system($cmd);
        });
        Artisan::command('ladmin:publish:laratrust', function () {
            $this->info("LaratrustAdmin publish laratrust");
            $cmd = 'php artisan vendor:publish --tag="laratrust"';
            $cmd .= ' && php artisan laratrust:setup';
            $cmd .= ' && composer dump-autoload';
            system($cmd);
        });
        Artisan::command('ladmin:publish:admin', function () {
            $this->info("LaratrustAdmin publish Admin");
            $cmd = 'php artisan vendor:publish --tag="LaratrustAdminReplaceViews"';
            $cmd .= ' && php artisan vendor:publish --tag="LaratrustAdminReplaceControllers"';
            $cmd .= ' && php artisan vendor:publish --tag="LaratrustAdminReplaceModels"';
            system($cmd);
        });
        Artisan::command('ladmin:publish:temp', function () {
            $this->info("LaratrustAdmin publish Temp");
            $cmd = 'php artisan vendor:publish --tag="LaratrustAdminTempSetting"';
            system($cmd);
        });
    }


}
