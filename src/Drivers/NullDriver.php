<?php

namespace Calen\Persist\Drivers;

use Calen\Persist\Manager\Manager;

class NullDriver extends Driver
{
    public function getManager() : Manager
    {
        return null;
    }
}