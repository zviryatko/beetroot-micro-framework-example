<?php

namespace App;

use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;

class Router implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    private RoutesCollection $routes;

    public function __construct(RoutesCollection $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $request_uri)
    {
        if (!empty($this->routes[$request_uri]) && class_exists($this->routes[$request_uri])) {
            $className = $this->routes[$request_uri];
        } else {
            $className = \App\Controllers\NotFound::class;
        }
        $controller = $this->getContainer()->get($className);

        return $controller->view();
    }

    public function generateUrl(string $controller): ?string
    {
        if ($uri = array_search($controller, (array) $this->routes)) {
            return $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['SERVER_NAME'] . $uri;
        }
        return null;
    }
}
