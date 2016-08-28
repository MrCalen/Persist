<?php

namespace Calen\Persist\Persister;
use Calen\Persist\Config\ConfigHandler;
use Calen\Persist\Drivers\NullDriver;
use Calen\Persist\Exceptions\NoDriverFoundException;

/**
 * Class Persister : Entry point
 * @package Calen\Persist\Persister
 */
class Persister
{

    protected $app;
    protected $config;

    /**
     * Persister constructor.
     * @param $app
     * @throws NoDriverFoundException
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->config = new ConfigHandler();
        $this->driver = $this->config->parse();
        if ($this->driver instanceof NullDriver) {
            throw new NoDriverFoundException();
        }
    }

    /**
     * Persists a key in the driver
     * @param $key : the key to save
     * @param $value : the value to be save
     * @returns void
     */
    public function persist($key, $value)
    {
        $this->driver->persist($key, $value);
    }

    /**
     * Deletes an entry
     * @param $key : the key to delete
     * @returns void
     */
    public function forget($key)
    {
        $this->driver->forget($key);
    }

    /**
     * Get a registered key
     * @param $key : the key to be retrieved
     * @return mixed
     */
    public function get($key)
    {
        return $this->driver->get($key);
    }

    /**
     * Explicit save
     */
    public function save()
    {
        $this->driver->save();
    }
}