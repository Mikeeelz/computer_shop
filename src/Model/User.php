<?php

namespace App\Model;

use App\DB;

class User
{
    public ?int $id = null;
    public string $name;
    public string $email;
    private ?string $password = null;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = md5($password);
    }

    public function save(): void
    {
        $sql = 'insert into user (name, email, password) values (:name, :email, :password)';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('name', $this->name);
        $query->bindParam('email', $this->email);
        $query->bindParam('password', $this->password);
        $query->execute();
    }
}