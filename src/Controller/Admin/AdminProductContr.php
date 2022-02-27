<?php

namespace App\Controller\Admin;

use App\Model\Brand;
use App\Model\Category;
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
        Twig::render('admin/catalog/product/create.html.twig', [
            'categories' => Category::findAll(),
            'brands' => Brand::findAll(),
        ]);
    }

    public function save(): void
    {
        $product = new Product($_POST['title'], $_POST['price'], $this->saveImage());
        $product->categoryId = $_POST['categoryId'];
        $product->brandId = $_POST['brandId'];
        $product->save();

        header('Location: http://localhost/admin/product');
    }

    public function edit(int $id): void
    {
        Twig::render('admin/catalog/product/edit.html.twig', [
            'product' => Product::findById($id),
            'categories' => Category::findAll(),
            'brands' => Brand::findAll(),
        ]);
    }

    public function update(int $id): void
    {
        $product = Product::findById($id);
        $product->title = $_POST['title'];
        $product->price = (int)$_POST['price'];
        $product->categoryId = (int)$_POST['categoryId'];
        $product->brandId = (int)$_POST['brandId'];
        $image = $this->saveImage();

        if ($image !== null) {
            $this->deleteImage($product->image);
            $product->image = $image;
        }

        $product->save();

        header('Location: http://localhost/admin/product');
    }

    private function saveImage(): ?string
    {
        $fileData = $_FILES['image'];

        if ($fileData['error'] !== 0) {
            return null;
        }

        $extension = explode('/', $fileData['type']);
        $fileName = 'product_' . time() . '.' . $extension[1];
        $filePath = '/upload/' . $fileName;

        if (copy($fileData['tmp_name'], __DIR__ . '/../../../public' . $filePath)) {
            unlink($fileData['tmp_name']);
        }

        return $filePath;
    }

    private function deleteImage(string $image): void
    {
        $filePath = __DIR__ . '/../../../public' . $image;

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
