<?php

namespace App;

use PDO;

class DB
{
    public static function getConnection(): PDO
    {
        $params = require_once __DIR__ . '/../config/db_params.php';

        $dsn = sprintf('mysql:host=%s;dbname=%s', $params['host'], $params['database']);
        //dd($dsn);

        return new PDO($dsn, $params['user'], $params['password']);
    }
}
