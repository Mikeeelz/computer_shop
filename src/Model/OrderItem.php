<?php

namespace App\Model;

class OrderItem
{
    public function __construct(
        public int $orderId,
        public int $productId,
        public int $price,
        public int $count,
    ) {
    }
}
