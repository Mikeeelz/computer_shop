<?php

return [
    '/product/([0-9]+)' => 'product page',
    '/login' => '\App\Controller\AuthController:index',
    '/register' => '\App\Controller\AuthController:register',
    '/auth' => '\App\Controller\AuthController:auth',
    '/logout' => '\App\Controller\AuthController:logout',
    '/cart/add/([0-9]+)' => '\App\Controller\CartController:add',
    '/cart/increase/([0-9]+)' => '\App\Controller\CartController:increase',
    '/cart/reduce/([0-9]+)' => '\App\Controller\CartController:reduce',
    '/cart/remove/([0-9]+)' => '\App\Controller\CartController:remove',
    '/cart' => '\App\Controller\CartController:index',
    '/order/create' => '\App\Controller\CartController:create',
    '/category/([0-9]+)' => '\App\Controller\CatalogController:category',
    '/brand/([0-9]+)' => '\App\Controller\CatalogController:brand',
    '/admin/order' => '\App\Controller\Admin\AdminOrderController:index',
    '/admin/product/edit/([0-9]+)' => '\App\Controller\Admin\AdminProductContr:edit',
    '/admin/product/update/([0-9]+)' => '\App\Controller\Admin\AdminProductContr:update',
    '/admin/product/create' => '\App\Controller\Admin\AdminProductContr:create',
    '/admin/product/save' => '\App\Controller\Admin\AdminProductContr:save',
    '/admin/product' => '\App\Controller\Admin\AdminProductContr:index',
    '/admin/brand/edit/([0-9]+)' => '\App\Controller\Admin\AdminBrandController:edit',
    '/admin/brand/update/([0-9]+)' => '\App\Controller\Admin\AdminBrandController:update',
    '/admin/brand/create' => '\App\Controller\Admin\AdminBrandController:create',
    '/admin/brand/save' => '\App\Controller\Admin\AdminBrandController:save',
    '/admin/brand' => '\App\Controller\Admin\AdminBrandController:index',
    '/admin/category/edit/([0-9]+)' => '\App\Controller\Admin\AdminCategoryController:edit',
    '/admin/category/update/([0-9]+)' => '\App\Controller\Admin\AdminCategoryController:update',
    '/admin/category/create' => '\App\Controller\Admin\AdminCategoryController:create',
    '/admin/category/save' => '\App\Controller\Admin\AdminCategoryController:save',
    '/admin/category' => '\App\Controller\Admin\AdminCategoryController:index',
    '/admin' => '\App\Controller\Admin\AdminIndexController:index',
    '/' => '\App\Controller\IndexController:index',
];
