<?php

namespace Calen\Persist\Persister;

/**
 * Class Persister : Entry point
 * @package Calen\Persist\Persister
 */
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

    /**
     * Persists a key in the driver
     * @param $key : the key to save
     * @param $value : the value to be save
     */
    public function persist($key, $value)
    {
        dd($key);
    }

    /**
     * Deletes an entry
     * @param $key : the key to delete
     */
    public function forget($key)
    {
        dd($key);
    }
}