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

        $migrationName = 'migrations/2016_10_05_104219_create_persist_table.php';
        $this->publishes([
            __DIR__."/{$migrationName}" => base_path("databases/{$migrationName}"),
        ]);
    }
}