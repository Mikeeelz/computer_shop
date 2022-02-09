<?php

namespace App\Controller\Admin;

use App\Model\User;
use App\Twig;

class AdminIndexController
{
    public function index(): void
    {
        if (!User::isAuthorized()) {
            header('Location: http://localhost/login');
            return;
        }

        Twig::render('admin/index.html.twig') ;
    }
}
