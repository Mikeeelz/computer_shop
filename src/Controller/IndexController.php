<?php

namespace App\Controller;

class IndexController
{
    public function index(): void
    {
        require_once __DIR__ . '/../../templates/index.php';
    }
}
