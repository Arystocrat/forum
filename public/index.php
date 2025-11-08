<?php
require_once __DIR__ . '/../core/Router.php';

$uri = $_SERVER['REQUEST_URI'];

$router = new Router;

$router->add('/', __DIR__ . '/../app/Controllers/home.php');
$router->add('/about', __DIR__ . '/../app/Controllers/about.php');

$router->dispatch($uri);
