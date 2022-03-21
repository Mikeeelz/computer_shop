<?php

namespace App;

use App\Model\Consultant;
use App\Model\User;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class Twig
{
    public static function render(string $name, array $params = []): void
    {
        echo Twig::get()->render($name, $params);
    }

    private static function get(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        $twig = new Environment($loader);

        $twig->addGlobal('get', $_GET);

        $twig->addFunction(new TwigFunction('getConsultants', function (): array {
            return Consultant::findAll();
        }));

        $twig->addFunction(new TwigFunction('isAuth', function (): bool {
            return User::isAuthorized();
        }));

        $twig->addFunction(new TwigFunction('getCartCount', function (): int {
            $sum = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $count) {
                    $sum += $count;
                }
            } else {
                return 0;
            }
            return $sum;
        }));

        return $twig;
    }
}
