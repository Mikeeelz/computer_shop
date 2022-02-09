<?php

namespace App\Controller\Admin;

use App\Model\Category;
use App\Twig;

class AdminCategoryController
{
    public function index(): void
    {
        Twig::render('admin/catalog/category/list.html.twig', [
            'result' => Category::findAll(),
        ]);
    }

    public function create(): void
    {
        Twig::render('admin/catalog/category/create.html.twig');
    }

    public function save(): void
    {
        $category = new Category($_POST['title']);
        $category->save();

        header('Location: http://localhost/admin/category');
    }

    public function edit(int $id): void
    {
        Twig::render('admin/catalog/category/edit.html.twig', [
            'category' => Category::findById($id),
        ]);
    }

    public function update(int $id): void
    {
        $category = Category::findById($id);
        $category->title = $_POST['title'];
        $category->save();

        header('Location: http://localhost/admin/category');
    }
}
