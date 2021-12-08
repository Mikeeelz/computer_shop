<?php

return [
    '/product/([0-9]+)' => 'product page',
    '/cart' => '\App\Controller\CartController:Cart',
    '/' => '\App\Controller\IndexController:index',
];
