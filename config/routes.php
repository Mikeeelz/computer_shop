<?php

return [
    '/product/([0-9]+)' => 'product page',
    '/login' => '\App\Controller\AuthController:index',
    '/register' => '\App\Controller\AuthController:register',
    '/cart' => '\App\Controller\CartController:Cart',
    '/' => '\App\Controller\IndexController:index',
];
