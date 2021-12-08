<?php

namespace App\Controller;

class IndexController
{
    public function index(): void
    {
        $brands = [
            'AMD',
            'Nvidia',
            'Intel',
            'Razer',
            'Logitech',
            'Bloody',
            'HyperX',
            'Gigabyte',
            'Asus',
            'MSI',
            'Sapphire',
        ];

        $categories = [
            'Материнские платы',
            'Процессоры',
            'Видеокарты',
            'Оперативная память',
            'Наушники',
            'Клавиатуры',
            'Игровые мыши',
            'Блоки питания',
        ];

        $products = [
            [
                'title' => 'Sapphire Toxic Radeon RX 6900 XT Limited Edition (16 ГБ)',
                'image' => '/media/products/6900.jpg',
                'price' => 170_000,
            ],
        ];

        $banners = [
            [
                'title' => 'СКИДКА <span>30%</span>',
                'subtitle' => 'Скидки на видеокарты',
                'description' => 'Успей купить видеокарты со скидками до 21.10.2021',
                'image' => '/media/slider/slider1.jpg',
            ],
            [
                'title' => 'СКОРО В ПРОДАЖЕ',
                'subtitle' => 'Водяное охлаждение',
                'description' => 'В продаже с 28.10.2021',
                'image' => '/media/slider/slider2.jpg',
            ],
            [
                'title' => 'Компьютерный мастер Андрей',
                'subtitle' => null,
                'description' => 'Здравствуйте, меня зовут Андрей. Помогу ваму собрать компьютер, установить Windows и антивирус.',
                'image' => '/media/slider/serega.jpg',
            ],
        ];

        require_once __DIR__ . '/../../templates/index.php';
    }
}
