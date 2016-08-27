<?php

namespace Calen\Persist;

use Illuminate\Support\ServiceProvider;
use Calen\Persist\Persister\Persister;

class PersistServiceProvider extends ServiceProvider
{
    public function boot()
    {}

    public function register()
    {
        $this->app->singleton('persist', function ($app) {
            return new Persister($app);
        });

        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('persist.php'),
        ]);
    }
}