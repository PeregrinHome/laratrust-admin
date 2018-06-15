<?php

namespace LaratrustAdmin;

use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'LaratrustAdmin');
    }

    public function register()
    {
    }
}
