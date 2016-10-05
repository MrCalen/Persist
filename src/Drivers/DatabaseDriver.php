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
    public function __construct($app)
    {
        $this->tableName = config('persist.table');
        if (!$this->tableName) {
            throw new NoDriverFoundException();
        }
        $connect = $app['db']->connection();

        $this->dbMgr = new DatabaseManager($connect, $this->tableName);
        $this->dbMgr->parse();
    }

    public function getManager() : Manager
    {
        return $this->dbMgr;
    }
}