<?php

return [
    '/product/([0-9]+)' => 'product page',
    '/login' => '\App\Controller\AuthController:index',
    '/register' => '\App\Controller\AuthController:register',
    '/auth' => '\App\Controller\AuthController:auth',
    '/logout' => '\App\Controller\AuthController:logout',
    '/cart' => '\App\Controller\CartController:Cart',
    '/admin' => '\App\Controller\Admin\AdminIndexController:index',
    '/' => '\App\Controller\IndexController:index',
];
