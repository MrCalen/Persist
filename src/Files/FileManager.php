<?php

namespace Calen\Persist\Files;

class FileManager
{
    protected $filename;

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
}