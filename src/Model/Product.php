<?php

namespace App\Model;

use App\DB;

class Product
{
    public ?int $id = null;
    public string $title;
    public int $price;
    public string $image;
    public ?int $categoryId = null;

    public function __construct(
        string $title,
        int $price,
        string $image,
        ?int $id = null
    ) {
        $this->title = $title;
        $this->id = $id;
        $this->image = $image;
        $this->price = $price;
    }

    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select * from product');

        $result = [];

        foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $product) {
            $item = new Product($product['title'], $product['price'], $product['image'], $product['id']);
            $item->categoryId = $product['category_id'];

            $result[] = $item;
        }

        return $result;
    }

    public static function findById(int $id): Product
    {
        $sql = 'select * from product where id = :id';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('id', $id);
        $query->execute();
        $product = $query->fetch(\PDO::FETCH_ASSOC);

        $result = new Product($product['title'], $product['price'], $product['image'], $product['id']);
        $result->categoryId = $product['category_id'];

        return $result;
    }

    public function save(): void
    {
        if ($this->id === null) {
            $sql = 'insert into product (title,price, image, category_id) values (:title, :price, :image, :category_id)';
        } else {
            $sql = 'update product set title = :title, price = :price, image=:image, category_id=:category_id where id = :id';
        }

        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('title', $this->title);
        $query->bindParam('price', $this->price);
        $query->bindParam('image', $this->image);
        $query->bindParam('category_id', $this->categoryId);

        if ($this->id !== null) {
            $query->bindParam('id', $this->id);
        }

        $query->execute();
    }

    public function getCategory(): Category
    {
        return Category::findById($this->categoryId);
    }
}