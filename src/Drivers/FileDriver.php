<?php

namespace Calen\Persist\Drivers;

use Calen\Persist\Exceptions\NoDriverFoundException;
use Calen\Persist\Manager\FileManager;
use Calen\Persist\Manager\Manager;

class FileDriver extends Driver
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

    public function getManager() : Manager
    {
        return $this->fileMgr;
    }
}