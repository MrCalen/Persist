<?php

namespace Calen\Persist\Drivers;

class NullDriver implements PersistantInterface
{
    public function persist($k, $v)
    {}

    public function forget($k)
    {}

    public function get($k)
    {}
}