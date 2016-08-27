<?php

namespace Calen\Persist;

use Illuminate\Support\ServiceProvider;
use Calen\Persist\Persister\Persister;

class PersistServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton('persist', function ($app) {
            return new Persister($app);
        });
    }

    public function register()
    {}
}