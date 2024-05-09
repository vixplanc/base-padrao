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
        $this->loadRoutesFrom($this->app->basePath().'/vendor/vixplanc/base-padrao/src/routes/web.php');
        $this->loadMigrationsFrom($this->app->basePath().'/vendor/vixplanc/base-padrao/src/database/migrations');
        $this->publishes([
            $this->app->basePath().'/vendor/vixplanc/base-padrao/src/lang' => $this->app->langPath(),
        ]);
        $this->publishes([
            $this->app->basePath().'/vendor/vixplanc/base-padrao/src/resources' => $this->app->resourcePath(),
        ]);

        $this->publishes([
            $this->app->basePath().'/vendor/vixplanc/base-padrao/src/public' => $this->app->publicPath(),
        ]);
        $this->publishes([
            $this->app->basePath().'/vendor/vixplanc/base-padrao/src/storage' => $this->app->storagePath(),
        ]);
        $this->publishes([
            $this->app->basePath().'/vendor/vixplanc/base-padrao/src/database' => $this->app->databasePath(),
        ]);
    }
}
