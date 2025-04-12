<?php

namespace Dennist12\TurnstileServices;

use Illuminate\Support\ServiceProvider;

class TurnstileServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__ . '/../config/turnstile.php' => config_path('turnstile.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        // Merge the configuration file
        $this->mergeConfigFrom(
            __DIR__ . '/../config/turnstile.php',
            'turnstile'
        );
    }
}
