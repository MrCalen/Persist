<?php

namespace Calen\Persist\Persister;

class Persister
{

    protected $app;

    /**
     * Persister constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function persist($key, $value)
    {
        dd($key);
    }

    public function forget($key)
    {
        dd($key);
    }
}