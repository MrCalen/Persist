<?php

namespace Calen\Persist\Manager;

use Calen\Persist\Entry\EntryManager;
use App;
use DB;

class DatabaseManager extends Manager
{
    protected $table;
    protected $data;
    protected $entryMgr;
    protected $connection;

    public function __construct($connection, string $table)
    {
        $this->table = $table;
        $this->entryMgr = new EntryManager();
        $this->connection = $connection;
    }

    private function createIfNotExists()
    {
        $this->data = DB::table($this->table)->first();
        if (!$this->data) {
            $this->data = [];
            $this->save();
        } else {
            $this->data = $this->data->data;
        }
        $this->data = json_decode($this->data, true);
    }

    public function parse()
    {
        $this->createIfNotExists();
    }

    public function save()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'data' => json_encode($this->data),
        ]);
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