<?php

namespace App;

class Application
{
    public function run(): void
    {
        $routes = require_once '../config/routes.php';
        $uri = $_SERVER['REQUEST_URI'];

        foreach ($routes as $pattern => $page) {
           if ($this->handlePattern($pattern, $uri, $page)) {
               return;
           }
        }

        echo 'Error in routes.php';
    }

    private function handlePattern(string $pattern, string $uri, string $page): bool
    {
        $match = null;
        preg_match("~$pattern~", strtolower($uri), $match);

        if (empty($match)) {
            return false;
        }

        $parts = explode(':', $page);

        $controller = new $parts[0];

        $controller->{$parts[1]}();

        return true;
    }

//    альтернативная версия с "лесенкой"
//    private function handlePattern(string $pattern, string $uri, string $page): bool
//    {
//        $match = null;
//        preg_match("~$pattern~", $uri, $match);
//
//        if (!empty($match)) {
//            $parts = explode(':', $page);
//
//            $controller = new $parts[0];
//
//            $controller->{$parts[1]}();
//
//            return true;
//        }
//
//        return false;
//    }
}
