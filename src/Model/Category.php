<?php

namespace App\Model;

use App\DB;

class Category
{
    public ?int $id = null;
    public string $title;

    public function __construct(string $title, ?int $id = null)
    {
        $this->title = $title;
        $this->id = $id;
    }

    public static function findAll(): array
    {
        $connection = DB::getConnection();

        $query = $connection->query('select id, title from category');

        $result = [];

        foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $category) {
            $result[] = new Category($category['title'], $category['id']);
        }

        return $result;
    }

    public static function findById(int $id): Category
    {
        $sql = 'select id, title from category where id = :id';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('id', $id);
        $query->execute();
        $category = $query->fetch(\PDO::FETCH_ASSOC);

        return new Category($category['title'], $category['id']);
    }

    public function save(): void
    {
        if ($this->id === null) {
            $sql = 'insert into category (title) values (:title)';
        } else {
            $sql = 'update category set title = :title where id = :id';
        }

        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('title', $this->title);

        if ($this->id !== null) {
            $query->bindParam('id', $this->id);
        }

        $query->execute();
    }
}

