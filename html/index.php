<?php

require_once '../vendor/autoload.php';

$app = new \App\App();
$container = $app->initContainer();
/** @var \App\Router $router */
$router = $container->get(App\Router::class);
print $router->dispatch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
