<?php

namespace App\Model;

class Order
{
    public ?int $id = null;
    public int $userId;
    public string $address;

    public function __construct(
        int $userId,
        string $address,
    )
    {
        $this->userId = $userId;
        $this->address = $address;
    }
}
