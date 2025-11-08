<?php
require_once __DIR__ . '/../src/Router.php';

$uri = $_SERVER['REQUEST_URI'];

$router = new Router;

$router->add('/', __DIR__ . '/../src/home.php');
$router->add('/about', __DIR__ . '/../src/about.php');

$router->dispatch($uri);
