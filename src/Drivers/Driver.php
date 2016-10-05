<?php

namespace Calen\Persist\Drivers;

use Calen\Persist\Manager\Manager;

abstract class Driver implements PersistantInterface
{
    public abstract function getManager() : Manager;

    public function persist($k, $v, $save = false)
    {
        $this->getManager()->changeEntry($k, $v);
        $this->shouldSave($save);
    }

    public function forget($k, $save = false)
    {
        $this->getManager()->removeEntry($k);
        $this->shouldSave($save);
    }

    public function get($k)
    {
        return $this->getManager()->getEntry($k);
    }

    public function save()
    {
        $this->shouldSave(true);
    }

    private function shouldSave($save)
    {
        if ($save) {
            $this->getManager()->save();
        }
    }
}