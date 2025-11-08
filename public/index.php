<!DOCTYPE html>
<html>
<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8" />
</head>
<body>
<table>
    <?php
    require_once __DIR__ . '/../src/Router.php';

    $uri = $_SERVER['REQUEST_URI'];

    $router = new Router;

    $router->add('/', __DIR__ . '/../src/home.php');
    $router->add('/about', __DIR__ . '/../src/about.php');

    $router->dispatch($uri);
    ?>
</table>
</body>
</html>