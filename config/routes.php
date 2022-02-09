<?php

return [
    '/product/([0-9]+)' => 'product page',
    '/login' => '\App\Controller\AuthController:index',
    '/register' => '\App\Controller\AuthController:register',
    '/auth' => '\App\Controller\AuthController:auth',
    '/logout' => '\App\Controller\AuthController:logout',
    '/cart' => '\App\Controller\CartController:cart',
    '/admin/category/edit/([0-9]+)' => '\App\Controller\Admin\AdminCategoryController:edit',
    '/admin/category/update/([0-9]+)' => '\App\Controller\Admin\AdminCategoryController:update',
    '/admin/category/create' => '\App\Controller\Admin\AdminCategoryController:create',
    '/admin/category/save' => '\App\Controller\Admin\AdminCategoryController:save',
    '/admin/category' => '\App\Controller\Admin\AdminCategoryController:index',
    '/admin' => '\App\Controller\Admin\AdminIndexController:index',
    '/' => '\App\Controller\IndexController:index',
];
