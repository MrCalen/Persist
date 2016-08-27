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
}