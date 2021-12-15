<?php

namespace App\Model;

use App\DB;

class Category
{
    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, title from category');

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}

