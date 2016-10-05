<?php

namespace Calen\Persist\Drivers;

use Calen\Persist\Exceptions\NoDriverFoundException;
use Calen\Persist\Manager\DatabaseManager;
use Calen\Persist\Manager\Manager;

class DatabaseDriver extends Driver
{
    protected $dbMgr;
    protected $tableName;

    /**
     * DatabaseDriver constructor.
     */
    public function __construct()
    {
        $this->tableName = config('persist.table');
        if (!$this->tableName) {
            throw new NoDriverFoundException();
        }

        $this->dbMgr = new DatabaseManager($this->tableName);
    }

    public function getManager() : Manager
    {
        return $this->dbMgr;
    }
}