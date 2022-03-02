<?php

namespace App\Controller;

use App\Model\Banner;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Twig;

class CatalogController
{
    public function category(int $id): void
    {
        Twig::render('category.html.twig', [
            'category' => Category::findById($id),
            'categories' => Category::findAll(),
            'brands' => Brand::findAll(),
            'products' => Product::findByCategoryId($id),
        ]);
    }

    public function brand(int $id): void
    {
        Twig::render('brand.html.twig', [
            'brand' => Brand::findById($id),
            'categories' => Category::findAll(),
            'brands' => Brand::findAll(),
            'products' => Product::findByBrandId($id),
        ]);
    }
}
