<?php

namespace App\Controller\Admin;

use App\Model\OrderItem;
use App\Twig;

class AdminOrderController
{
    public function index(): void
    {
        Twig::render('admin/orders/order/list.html.twig', [
            'result' => OrderItem::findAll(),
        ]);
    }
}