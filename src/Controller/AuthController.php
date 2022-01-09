<?php

namespace App\Controller;

use App\Model\Consultant;
use App\Model\User;

class AuthController
{
    public function index(): void
    {
        $consultants = Consultant::findAll();

        require_once __DIR__ . '/../../templates/login.php';
    }

    public function register(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User($name, $email);
        $user->setPassword($password);
        $user->save();

        header('Location: http://localhost/login');
    }
}