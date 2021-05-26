<?php

namespace App\Providers;

use App\Http\Services\CarApi;
use App\Http\Services\MotoApi;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Engine;
use App\Models\MotoBrand;
use App\Models\MotoEngine;
use App\Models\MotoModel;
use App\Models\MotoRatio;
use App\Models\MotoSize;
use App\Models\MotoWidth;
use App\Models\Ratio;
use App\Models\Size;
use App\Models\Width;
use App\Models\Year;
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
        $this->app->singleton(CarApi::class, function($app, $params) {
            return new CarApi($params);
        });
        $this->app->singleton(MotoApi::class, function($app, $params) {
            return new MotoApi($params);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with('search_brands', Brand::all());
            $view->with('search_models', CarModel::all());
            $view->with('search_years', Year::all());
            $view->with('search_engines', Engine::all());
            $view->with('search_widths', Width::all());
            $view->with('search_ratios', Ratio::all());
            $view->with('search_sizes', Size::all());
            $view->with('search_moto_brands', MotoBrand::all());
            $view->with('search_moto_models', MotoModel::all());
            $view->with('search_moto_engines', MotoEngine::all());
            $view->with('search_moto_widths', MotoWidth::all());
            $view->with('search_moto_ratios', MotoRatio::all());
            $view->with('search_moto_sizes', MotoSize::all());

        });
    }
}

