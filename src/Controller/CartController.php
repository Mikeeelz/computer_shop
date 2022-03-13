<?php

namespace App\Controller;

use App\Twig;

class CartController
{
    public function index(): void
    {
        Twig::render('cart.html.twig');
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
}