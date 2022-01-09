<?php

namespace App\Controller;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Banner;
use App\Model\Consultant;
use App\Model\Product;

class IndexController
{
    public function index(): void
    {
        $brands = Brand::findAll();

        $categories = Category::findAll();

        $products = Product::findAll();

        $banners = Banner::findAll();

        $consultants = Consultant::findAll();

        require_once __DIR__ . '/../../templates/index.php';
    }
}
