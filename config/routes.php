<?php

return [
    '/product/([0-9]+)' => 'product page',
    '/login' => '\App\Controller\AuthController:index',
    '/register' => '\App\Controller\AuthController:register',
    '/auth' => '\App\Controller\AuthController:auth',
    '/cart' => '\App\Controller\CartController:Cart',
    '/' => '\App\Controller\IndexController:index',
];
