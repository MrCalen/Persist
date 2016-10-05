<?php

namespace Calen\Persist\Config;

use Calen\Persist\Drivers\DatabaseDriver;
use Calen\Persist\Drivers\FileDriver;
use Calen\Persist\Drivers\NullDriver;
use Calen\Persist\Drivers\PersistantInterface;

class ConfigHandler
{
    public function parse() : PersistantInterface
    {
        $driver = config('persist.driver');
        switch ($driver) {
            case 'file':
                return new FileDriver();
            case 'database':
                return new DatabaseDriver();
        }
        return new NullDriver();
    }
}