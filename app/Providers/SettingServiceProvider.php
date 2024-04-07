<?php

namespace App\Providers;

use App\Listeners\UpdateSettingsCacheListener;
use App\Models\personalizar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        personalizar::created(function (personalizar $personalizar) {
            event(new \App\Events\PersonalizarCreated($personalizar));
        });

        $this->app['events']->listen(
            \App\Events\PersonalizarCreated::class,
            UpdateSettingsCacheListener::class
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('settings', function ($app) {
            $personalizar = $app->make(personalizar::class);
            return Cache::rememberForever('settings', function () use ($personalizar) {
                $latestSetting = $personalizar->latest('created_at')->first();
                return $latestSetting ? $latestSetting->toArray() : [];
            });
        });
    }
}
