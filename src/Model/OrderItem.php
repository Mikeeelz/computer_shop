<?php

namespace App\Model;

use App\DB;

class OrderItem
{
    public function __construct(
        public int $orderId,
        public int $productId,
        public int $price,
        public int $count,
    )
    {
    }

    public function save(): void
    {
        $sql = 'insert into order_item (order_id,product_id, price, count) values (:order_id, :product_id, :price, :count)';
        $connection = DB::getConnection();
        $query = $connection->prepare($sql);
        $query->bindParam('order_id', $this->orderId);
        $query->bindParam('product_id', $this->productId);
        $query->bindParam('price', $this->price);
        $query->bindParam('count', $this->count);
        $query->execute();
    }
}
