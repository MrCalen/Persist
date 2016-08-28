<?php

namespace Calen\Persist\Drivers;

/**
 * Interface PersistantInterfcace
 * @package Calen\Persist\Drivers
 */
interface PersistantInterface
{
    public function persist($k, $v);
    public function forget($k);
    public function get($k);
}