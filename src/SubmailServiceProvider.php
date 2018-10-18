<?php

namespace Eckoo\SDK;

use Illuminate\Support\ServiceProvider;

class SubmailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'config'
        );
        $this->app->singleton(Submail::class, function ($app) {
            return new Submail(config('submail'));
        });
    }
}
