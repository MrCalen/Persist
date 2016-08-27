<?php

namespace Calen\Persist\Facade;

use Illuminate\Support\Facades\Facade;

class Persist extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'persist';
    }
}