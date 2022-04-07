<?php
namespace App\Controllers;

use App\Router;

class Homepage extends AbstractController {

    /**
     * @var \App\Router
     */
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function view() {
        $links = [
            'Todo list' => $this->router->generateUrl(Todos::class),
            'Users list' => $this->router->generateUrl(Users::class),
            'User API' => $this->router->generateUrl(ApiUsers::class),
        ];
        $content = $this->viewTemplate('homepage', ['links' => $links]);
        $title = 'Homepage ' . time();
        return $this->viewWrapper($title, $content);
    }
}
