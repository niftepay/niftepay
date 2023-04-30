<?php

namespace niftepay\niftepay\provider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application Services.
     */
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php'=>config_path('NiftePay.php'),
            ],'config');
        }
    }

    /**
     * Register the application Services in Service Provider
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php','niftepay');

        // Register the main class to use with the facade
        $this->app->singleton('niftepay',function () {
            return new Niftepay;
        });
    }
}
