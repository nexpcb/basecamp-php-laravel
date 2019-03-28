<?php

namespace BasecampPhpLaravel;

use Illuminate\Support\ServiceProvider;

class BasecampPhpLaravelServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('basecamp-php-laravel.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'basecamp-php-laravel'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register basecamp client api
        $this->app->singleton('\BasecampPhpLaravel\BasecampClientService', function ($app) {
            return BasecampClientService::create();
        });
    }
}
