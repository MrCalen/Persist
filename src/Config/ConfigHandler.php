<?php

namespace Calen\Persist\Config;

use Calen\Persist\Drivers\PersistantInterface;

class ConfigHandler
{
    public function parse() : PersistantInterface
    {
        $driver = config('persist.driver');
        switch ($driver) {
            case 'file':
                dd("bite");
                break;
            case 'database':
                break;
            default:
                return null;
        }
        return null;
    }
}