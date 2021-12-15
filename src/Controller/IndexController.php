<?php

namespace App\Controller;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Banner;

class IndexController
{
    public function index(): void
    {
        $brands = Brand::findAll();

        $categories = Category::findAll();

        $products = [
            [
                'title' => 'Sapphire Toxic Radeon RX 6900 XT Limited Edition (16 ГБ)',
                'image' => '/media/products/6900.jpg',
                'price' => 170_000,
            ],
        ];

        $banners = Banner::findAll();

        $consultants = [
            'Евгений' => '/media/consultants/ConsultantEvgeni.jpg',
            'Владислав' => '/media/consultants/ConsultantVlad.jpg',
            'Максим' => '/media/consultants/ConsultantMaksim.jpg',
        ];

        $servise = [
            'Связаться с нами',
            'Статус заказа',
            'Изменить местоположение',
            'Часто задаваемые вопросы',
        ];

        $policies = [
            'Условия эксплуатации',
            'Политика конфиденциальности',
            'Политика возврата',
        ];

        $about_shopper = [
            'Информация о компании',
            'Карьера',
            'Расположение магазина',
            'Партнёрская программа',
        ];


        require_once __DIR__ . '/../../templates/index.php';
    }
}
