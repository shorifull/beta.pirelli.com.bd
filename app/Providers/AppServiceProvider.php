<?php

namespace App\Providers;

use App\Models\Ratio;
use App\Models\Size;
use App\Models\Width;
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
        view()->composer('*', function($view) {
            $view->with('search_widths', Width::all());
            $view->with('search_ratios', Ratio::all());
            $view->with('search_sizes', Size::all());

        });
    }
}
