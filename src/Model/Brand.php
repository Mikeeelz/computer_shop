<?php

namespace App\Model;

use App\DB;

class Brand
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

        $query = $connection->query('select id, title from brand');

        $result = [];

        foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $brand) {
            $result[] = new Brand($brand['title'], $brand['id']);
        }

        return $result;
    }

    public static function findById(int $id): Brand
    {
        $sql = 'select id, title from brand where id = :id';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('id', $id);
        $query->execute();
        $brand = $query->fetch(\PDO::FETCH_ASSOC);

        return new Brand($brand['title'], $brand['id']);
    }

    public function save(): void
    {
        if ($this->id === null) {
            $sql = 'insert into brand (title) values (:title)';
        } else {
            $sql = 'update brand set title = :title where id = :id';
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
