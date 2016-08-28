<?php

namespace Calen\Persist\Exceptions;

use Exception;

class NoDriverFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Persist driver not recognized", 500, null);
    }
}