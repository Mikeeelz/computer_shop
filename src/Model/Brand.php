<?php

namespace App\Model;

use App\DB;

class Brand
{
    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, title from brand');

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
