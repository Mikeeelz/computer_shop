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

    public static function findByEmail(string $email): ?User
    {
        $sql = 'select id, name, email, password from user where email=:email';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('email', $email);
        $query->execute();

        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        if (empty($result)) {
           return null;
        }
        $userData = $result[0];
        $name = $userData['name'];
        $user= new User($name, $email);
        $user->id = $userData['id'];
        $user->password = $userData['password'];

        return $user;
    }

    public function checkPassword(string $password): bool
    {
        return $this->password === md5($password);
    }
}