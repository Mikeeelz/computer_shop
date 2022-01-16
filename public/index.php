<?php

require_once '../vendor/autoload.php';

session_start();

$app = new \App\Application();

$app->run();
