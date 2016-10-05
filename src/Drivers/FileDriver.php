<?php

namespace Calen\Persist\Drivers;

use Calen\Persist\Exceptions\NoDriverFoundException;
use Calen\Persist\Manager\FileManager;

class FileDriver implements PersistantInterface
{
    protected $filename;
    protected $fileMgr;

    public function __construct()
    {
        $this->filename = config('persist.file');
        if (!$this->filename) {
            throw new NoDriverFoundException();
        }

        $this->fileMgr = new FileManager($this->filename);
        $this->fileMgr->parse();
    }

    public function persist($k, $v, $save = false)
    {
        $this->fileMgr->changeEntry($k, $v);
        $this->shouldSave($save);
    }

    public function forget($k, $save = false)
    {
        $this->fileMgr->removeEntry($k);
        $this->shouldSave($save);
    }

    public function get($k)
    {
        return $this->fileMgr->getEntry($k);
    }

    public function save()
    {
        $this->shouldSave(true);
    }

    private function shouldSave($save)
    {
        if ($save) {
            $this->fileMgr->save();
        }
    }

}