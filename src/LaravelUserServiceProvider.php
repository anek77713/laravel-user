<?php

namespace anek77713\LaravelUser;

use Illuminate\Support\ServiceProvider;

class LaravelUserServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'anek77713');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'anek77713');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraveluser.php', 'laraveluser');

        // Register the service the package provides.
        $this->app->singleton('laraveluser', function ($app) {
            return new LaravelUser;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laraveluser'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laraveluser.php' => config_path('laraveluser.php'),
        ], 'laraveluser.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/anek77713'),
        ], 'laraveluser.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/anek77713'),
        ], 'laraveluser.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/anek77713'),
        ], 'laraveluser.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
