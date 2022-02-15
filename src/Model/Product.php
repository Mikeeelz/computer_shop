<?php

namespace App\Model;

use App\DB;

class Product
{
    public ?int $id = null;
    public string $title;
    public int $price;

    public function __construct(string $title, ?int $id = null, int $price)
    {
        $this->title = $title;
        $this->id = $id;
        $this->price = $price;
    }

    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, title, price from product');

        $result = [];

        foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $product) {
            $result[] = new Product($product['title'], $product['id'], $product['price']);
        }

        return $result;
    }

    public static function findById(int $id): Product
    {
        $sql = 'select id, title, price from product where id = :id';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('id', $id);
        $query->execute();
        $product = $query->fetch(\PDO::FETCH_ASSOC);

        return new Product($product['title'], $product['id'], $product['price']);
    }

    public function save(): void
    {
        if ($this->id === null) {
            $sql = 'insert into product (title,price) values (:title, :price)';
        } else {
            $sql = 'update product set title = :title, price = :price where id = :id';
        }

        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('title', $this->title);
        $query->bindParam('price', $this->price);
        if ($this->id !== null) {
            $query->bindParam('id', $this->id);
        }

        $query->execute();
    }
}