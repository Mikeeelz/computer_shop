<?php

namespace App\Controller;

class CartController
{
    public function Cart(): void
    {
        require_once __DIR__ . '/../../templates/cart.php';
    }
}