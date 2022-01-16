<?php

namespace App\Model;

use App\DB;

class Consultant
{
    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, name, image from consultant');

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}