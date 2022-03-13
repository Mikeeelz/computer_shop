<?php

namespace App\Controller;

use App\Model\Product;
use App\Twig;

class CartController
{
    public function index(): void
    {
        $items = [];
        foreach ($_SESSION['cart'] as $productId => $count) {
            $items[] = [
                'product' => Product::findById($productId),
                'count' => $count,
            ];
        }

        Twig::render('cart.html.twig', ['items' => $items]);
    }

    public function add(int $id): void
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }

        $sum = 0;
        foreach ($_SESSION['cart'] as $count) {
            $sum += $count;
        }

        $response = [
            'sum' => $sum,
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function remove(int $id): void
    {
        unset($_SESSION['cart'][$id]);

        header('Location: http://localhost/cart');
    }
}