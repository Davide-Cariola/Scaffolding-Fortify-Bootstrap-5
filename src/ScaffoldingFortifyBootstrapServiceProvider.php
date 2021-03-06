<?php

namespace DavideCariola\ScaffoldingFortifyBootstrap;

use DavideCariola\ScaffoldingFortifyBootstrap\Console\ScaffoldingFortifyBootstrap;
use Illuminate\Support\ServiceProvider;

class ScaffoldingFortifyBootstrapServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        include __DIR__.'/routes.php';

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        
        
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->commands([
                ScaffoldingFortifyBootstrap::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../resources/views/welcome.blade.php' => resource_path('views/welcome.blade.php'),
        ], 'welcome');

        $this->publishes([
            __DIR__.'/../resources/js/app.js' => resource_path('js/app.js'),
        ], 'js');

        $this->publishes([
            __DIR__.'/../resources/css/app.css' => resource_path('css/app.css'),
        ], 'css');

        $this->publishes([
            __DIR__.'/../config/services.php' => app_path('config/services.php'),
        ], 'services.php');

        $this->publishes([
            __DIR__.'/../app/Controllers/SocialiteController.php' => app_path('Http/Controllers/SocialiteController.php'),
        ], 'socialiteController');

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ScaffoldingFortifyBootstrap.php', 'ScaffoldingFortifyBootstrap');

        // Register the service the package provides.
        $this->app->singleton('ScaffoldingFortifyBootstrap', function ($app) {
            return new ScaffoldingFortifyBootstrap;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ScaffoldingFortifyBootstrap'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/ScaffoldingFortifyBootstrap.php' => config_path('ScaffoldingFortifyBootstrap.php'),
        ], 'ScaffoldingFortifyBootstrap.config');

    }
}
