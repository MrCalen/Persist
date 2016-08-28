<?php

namespace Calen\Persist\Files;

use Calen\Persist\Exceptions\FilePermissionException;

class FileManager
{
    protected $filename;
    protected $data;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function createIfNotExists()
    {
        if (!file_exists($this->filename)) {
            try {
                file_put_contents($this->filename, "{}");
            } catch (\Exception $e) {
                throw new FilePermissionException();
            }
        }
    }

    public function parse()
    {
        $this->createIfNotExists();
        $this->data = file_get_contents($this->filename);
    }
}