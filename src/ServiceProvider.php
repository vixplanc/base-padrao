<?php

namespace Vixplanc\BasePadrao;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(realpath('').'/vendor/vixplanc/base-padrao/src/lang', 'vixplanc');
        // $this->loadViewsFrom(realpath('').'/vendor/vixplanc/base-padrao/src/resources', 'vixplanc');
        $this->loadRoutesFrom(realpath('').'/vendor/vixplanc/base-padrao/src/routes/web.php');
        $this->loadMigrationsFrom(realpath('').'/vendor/vixplanc/base-padrao/src/database/migrations');
        $this->publishes([
            realpath('').'/vendor/vixplanc/base-padrao/src/lang' => $this->app->langPath(),
        ]);
        $this->publishes([
            realpath('').'/vendor/vixplanc/base-padrao/src/resources' => $this->app->resourcePath(),
        ]);

        $this->publishes([
            realpath('').'/vendor/vixplanc/base-padrao/src/public' => $this->app->publicPath(),
        ]);
        $this->publishes([
            realpath('').'/vendor/vixplanc/base-padrao/src/storage' => $this->app->storagePath(),
        ]);
    }
}
