<?php

namespace Calen\Persist\Drivers;

/**
 * Interface PersistantInterfcace
 * @package Calen\Persist\Drivers
 */
interface PersistantInterface
{
    /**
     * Sets a new value related to the key given
     * @param $k : the key
     * @param $v : the value
     * @param bool $save : explicit save or not
     * @return void
     */
    public function persist($k, $v, $save = false);

    /**
     * Removes a key
     * @param $k : the key
     * @param bool $save : explicit save or not
     * @return void
     */
    public function forget($k, $save = false);

    /**
     * Get the value of the given key
     * @param $k : the key
     * @return mixed
     */
    public function get($k);

    /**
     * Explicit save
     */
    public function save();
}