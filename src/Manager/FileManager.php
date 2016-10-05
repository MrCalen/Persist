<?php

namespace Calen\Persist\Manager;

use Calen\Persist\Entry\EntryManager;
use Calen\Persist\Exceptions\FilePermissionException;
use Exception;

class FileManager implements Manager
{
    protected $filename;
    protected $data;
    protected $entryMgr;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->entryMgr = new EntryManager();
    }

    private function createIfNotExists()
    {
        if (!file_exists($this->filename)) {
            try {
                file_put_contents($this->filename, json_encode([]));
            } catch (Exception $e) {
                throw new FilePermissionException();
            }
        }
    }

    public function parse()
    {
        $this->createIfNotExists();
        $this->data = json_decode(file_get_contents($this->filename), true);
    }

    public function save()
    {
        file_put_contents($this->filename, json_encode($this->data));
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