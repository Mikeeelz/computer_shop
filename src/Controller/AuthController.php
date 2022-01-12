<?php

namespace App\Controller;

use App\DB;
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

        header('Location: http://localhost/login?success_register=1');
    }

    public function auth(): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::findByEmail($email);

        if ($user === null) {
            echo 'user is null';
            return;
        }

        if (!$user->checkPassword($password)) {
            echo 'password invalid';
            return;
        }

        echo 'ok';
    }
}

