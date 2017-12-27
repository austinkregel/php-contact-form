<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        // Add 2 blade directives to dry up the HTML a little bit.
        Blade::if('route', function ($route) {
            return request()->is($route);
        });
        Blade::if('notroute', function ($route) {
            return !request()->is($route);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
