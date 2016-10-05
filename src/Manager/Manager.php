<?php

namespace Calen\Persist\Manager;

interface Manager
{
    public function parse();

    public function save();

    public function changeEntry($key, $value);

    public function removeEntry($key);

    public function getEntry($key);
}