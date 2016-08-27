<?php

return [

    /**
     * @name: Driver
     * @description: database or file
     */
    'driver' => 'file',

    /**
     * @name: Database table
     * @description: if driver is database, use the given table
     */
    'table' => 'persist',

    /**
     * @name: storage path
     * @description: if driver is file, the storage path of the file
     */
    'file' => storage_path() . '/persist.json',

];