<?php

namespace App\Model;

use App\DB;

class Banner
{
    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, title, subtitle , description, image from banner');

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
