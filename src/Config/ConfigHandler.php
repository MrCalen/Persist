<?php

namespace Calen\Persist\Config;

use Calen\Persist\Drivers\NullDriver;
use Calen\Persist\Drivers\PersistantInterface;

class ConfigHandler
{
    public function parse() : PersistantInterface
    {
        $driver = config('persist.driver');
        switch ($driver) {
            case 'file':
                break;
            case 'database':
                break;
        }
        return new NullDriver();
    }
}