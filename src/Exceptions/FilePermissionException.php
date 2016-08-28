<?php

namespace Calen\Persist\Exceptions;

use Exception;

class FilePermissionException extends Exception
{
    public function __construct()
    {
        parent::__construct("Could not access file given in configuration file", 500, null);
    }
}