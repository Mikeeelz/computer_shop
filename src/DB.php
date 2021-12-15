<?php

namespace App;

use PDO;

class DB
{
    public static function getConnection(): PDO
    {
        $params = require __DIR__ . '/../config/db_params.php';

        $dsn = sprintf('mysql:host=%s;dbname=%s', $params['host'], $params['database']);

        return new PDO($dsn, $params['user'], $params['password']);
    }
}
