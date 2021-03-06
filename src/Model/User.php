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
        $this->id = $connection->lastInsertId();
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

    public function login(): void
    {
        $_SESSION['user_id'] = $this->id;
    }

    public static function logout(): void
    {
        unset($_SESSION['user_id']);
    }

    public static function getAuthUser(): ?User
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }

        $sql = 'select id, name, email, password from user where id = :id';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('id', $_SESSION['user_id']);
        $query->execute();

        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        if (empty($result)) {
            return null;
        }

        $userData = $result[0];
        $user= new User($userData['name'], $userData['email']);
        $user->id = $userData['id'];
        $user->password = $userData['password'];

        return $user;
    }

    public static function isAuthorized(): bool
    {
        return User::getAuthUser() !== null;
    }
}