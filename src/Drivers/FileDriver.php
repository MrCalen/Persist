<?php

namespace Calen\Persist\Drivers;

use Calen\Persist\Exceptions\NoDriverFoundException;
use Calen\Persist\Files\FileManager;

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
    {}

    public function forget($k, $save = false)
    {}

    public function get($k)
    {}

    public function save()
    {}
}