<?php

namespace App\Controller;

use App\Twig;

class CartController
{
    public function cart(): void
    {
        Twig::render('cart.html.twig');
    }
}