<?php

namespace Calen\Persist\Manager;

abstract class Manager
{
    public abstract function parse();

    public abstract function save();

    public abstract function changeEntry($key, $value);

    public abstract function removeEntry($key);

    public abstract function getEntry($key);

}