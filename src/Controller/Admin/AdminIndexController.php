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

        $twig = Twig::get();
        $html = $twig->render('admin/index.html.twig');
        echo $html;
    }
}
