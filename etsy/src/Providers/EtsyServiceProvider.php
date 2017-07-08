<?php

namespace Dyentite\Etsy\Providers;

use Illuminate\Support\ServiceProvider;

class EtsyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('etsy', function () {
            return new \Dyentite\Etsy\Etsy;
        });
    }
}
