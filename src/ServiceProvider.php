<?php

namespace SoluzioneSoftware\NovaResourceTableFooter;

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Nova;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function () {
            Nova::script('resource-table-footer', __DIR__.'/../dist/js/index.js');
        });

        $this->app->booted(function () {
            $this->routes();
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
            ->namespace('SoluzioneSoftware\NovaResourceTableFooter\Http\Controllers')
            ->prefix('nova-vendor/resource-table-footer')
            ->group(__DIR__.'/../routes/api.php');
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
