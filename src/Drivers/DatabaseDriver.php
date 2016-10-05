<?php

namespace Calen\Persist\Drivers;

class DatabaseDriver implements PersistantInterface
{

    protected $dbMgr;

    /**
     * DatabaseDriver constructor.
     */
    public function __construct()
    {
        $this->filename = config('persist.file');
    }


    /**
     * Sets a new value related to the key given
     * @param $k : the key
     * @param $v : the value
     * @param bool $save : explicit save or not
     * @return void
     */
    public function persist($k, $v, $save = false)
    {
        // TODO: Implement persist() method.
        dd("persist");
    }

    /**
     * Removes a key
     * @param $k : the key
     * @param bool $save : explicit save or not
     * @return void
     */
    public function forget($k, $save = false)
    {
        // TODO: Implement forget() method.
        dd("persist");
    }

    /**
     * Get the value of the given key
     * @param $k : the key
     * @return mixed
     */
    public function get($k)
    {
        // TODO: Implement get() method.
        dd("persist");
    }

    /**
     * Explicit save
     */
    public function save()
    {
        // TODO: Implement save() method.
        dd("persist");
    }
}