<?php

namespace App\Providers;

use App\Models\Operacion;
use App\Observers\OperacionObserver;
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
        Operacion::observe(OperacionObserver::class);
    }
}
