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

        header('Location: http://localhost/login?success_register=1');
    }

    public function auth(): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::findByEmail($email);

        if ($user === null) {
            header('Location: http://localhost/login?error_auth=1');
            return;
        }

        if (!$user->checkPassword($password)) {
            header('Location: http://localhost/login?error_auth=1');
            return;
        }

        $user->login();

        header('Location: http://localhost');
    }

    public function logout(): void
    {
        User::logout();

        header('Location: http://localhost');
    }
}

