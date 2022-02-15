<?php

namespace App\Controller\Admin;

use App\Model\Product;
use App\Twig;

class AdminProductContr
{
    public function index(): void
    {
        Twig::render('admin/catalog/product/list.html.twig', [
            'result' => Product::findAll(),
        ]);
    }

    public function create(): void
    {
        Twig::render('admin/catalog/product/create.html.twig');
    }

    public function save(): void
    {
        $product = new Product($_POST['title'], $_POST['price']);
        $product->save();

        header('Location: http://localhost/admin/product');
    }

    public function edit(int $id): void
    {
        Twig::render('admin/catalog/product/edit.html.twig', [
            'product' => Product::findById($id),
        ]);
    }

    public function update(int $id ): void
    {
        $product = Product::findById($id);
        $product->title = $_POST['title'];
        $product->price = $_POST['price'];
        $product->save();

        header('Location: http://localhost/admin/product');
    }
}
