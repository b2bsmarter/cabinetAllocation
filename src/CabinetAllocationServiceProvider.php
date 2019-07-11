<?php

namespace b2bmodules\cabinetAllocation;

use Illuminate\Support\ServiceProvider;

class CabinetAllocationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        include __DIR__.'/routes.php';
        include __DIR__.'/models';
        $this->loadMigrationsFrom(__DIR__.'database/migrations');
    }

    public function register()
    {
        $this->app->make('b2bmodules\cabinetAllocation\CabinetController');
        $this->loadViewsFrom(__DIR__.'/views', 'cabinet');
    }
}

?>