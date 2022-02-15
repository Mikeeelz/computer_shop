<?php

namespace App\Controller\Admin;

use App\Model\Brand;
use App\Twig;

class AdminBrandController
{
    public function index(): void
    {
        Twig::render('admin/catalog/brand/list.html.twig', [
            'result' => Brand::findAll(),
        ]);
    }

    public function create(): void
    {
        Twig::render('admin/catalog/brand/create.html.twig');
    }

    public function save(): void
    {
        $category = new Brand($_POST['title']);
        $category->save();

        header('Location: http://localhost/admin/brand');
    }

    public function edit(int $id): void
    {
        Twig::render('admin/catalog/brand/edit.html.twig', [
            'brand' => Brand::findById($id),
        ]);
    }

    public function update(int $id): void
    {
        $brand = Brand::findById($id);
        $brand->title = $_POST['title'];
        $brand->save();

        header('Location: http://localhost/admin/brand');
    }
}