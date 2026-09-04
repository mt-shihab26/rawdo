<?php

namespace Src\Core;

use PDO;

class Database extends PDO
{
    /**
     * Connect to the app's SQLite database file
     */
    public function __construct()
    {
        parent::__construct('sqlite:'.Paths::storage('database.sqlite'));

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}
