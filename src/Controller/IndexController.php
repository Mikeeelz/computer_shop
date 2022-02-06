<?php

namespace App\Controller;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Banner;
use App\Model\Product;
use App\Twig;

class IndexController
{
    public function index(): void
    {
        Twig::render('index.html.twig', [
            'banners' => Banner::findAll(),
            'categories' => Category::findAll(),
            'brands' => Brand::findAll(),
            'products' => Product::findAll(),
        ]);
    }
}
