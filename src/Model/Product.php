<?php

namespace App\Model;

use App\DB;

class Product
{
    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, title, image, price from product');

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}