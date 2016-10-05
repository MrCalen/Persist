<?php

namespace Calen\Persist\Drivers;

class NullDriver implements PersistantInterface
{
    public function persist($k, $v, $save = false)
    {}

    public function forget($k, $save = false)
    {}

    public function get($k)
    {}

    public function save()
    {}
}