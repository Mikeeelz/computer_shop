<?php

namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    public static function get(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        return new Environment($loader);
    }
}
