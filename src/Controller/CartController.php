<?php

namespace App\Controller;

use App\Model\Product;
use App\Twig;

class CartController
{
    public function index(): void
    {
        $price = 0;
        $items = [];
        foreach ($_SESSION['cart'] as $productId => $count) {
            $product = Product::findById($productId);
            $items[] = [
                'product' => $product,
                'count' => $count,
            ];
            $price += $product->price * $count;
        }

        Twig::render('cart.html.twig', [
            'items' => $items,
            'price' => $price,
        ]);
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

    public function increase(int $id): void
    {
        $_SESSION['cart'][$id]++;

        header('Location: http://localhost/cart');
    }

    public function reduce(int $id): void
    {
        $_SESSION['cart'][$id]--;

        header('Location: http://localhost/cart');
    }
}