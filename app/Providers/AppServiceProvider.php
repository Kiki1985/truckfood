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
        view()->composer("home", function ($view) {
            $trucks = \App\Truck::all();
            $view->with(compact("trucks"));
        });

        view()->composer("trucks.states", function ($view) {
            $states = \App\State::all();
            $view->with(compact("states"));
        });
    }
}
