<?php

namespace Calen\Persist\Manager;

use Calen\Persist\Entry\EntryManager;

class DatabaseManager implements Manager
{
    protected $table;
    protected $data;
    protected $entryMgr;

    public function __construct(string $table)
    {
        $this->table = $table;
        $this->entryMgr = new EntryManager();
    }

    public function parse()
    {
        $this->createIfNotExists();
        $this->data = null; //
    }

    public function save()
    {
        // save
    }

    public function changeEntry($key, $value)
    {
        $this->entryMgr->changeEntry($this->data, $key, $value);
    }

    public function removeEntry($key)
    {
        $this->entryMgr->deleteEntry($this->data, $key);
    }

    public function getEntry($key)
    {
        return $this->entryMgr->getEntry($this->data, $key);
    }

}