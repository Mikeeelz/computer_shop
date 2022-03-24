<?php

namespace App\Model;

use App\DB;

class Order
{
    public ?int $id = null;
    public int $userId;
    public string $address;

    public function __construct(
        int    $userId,
        string $address,
    )
    {
        $this->userId = $userId;
        $this->address = $address;
    }

    public function save(): void
    {
        $sql = 'insert into `order` (user_id, address) values (:user_id, :address)';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('user_id', $this->userId);
        $query->bindParam('address', $this->address);
        $query->execute();
        $this->id = $connection->lastInsertId();
    }
}
