<?php
namespace App\Controllers;

use App\Models\Todo;
use App\Router;
use App\Services\FlashMessenger;
use Doctrine\ORM\EntityManagerInterface;

class Todos extends AbstractController {

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;
    /**
     * @var \App\Router
     */
    private Router $router;

    public function __construct(EntityManagerInterface $entityManager, Router $router)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function view() {
        $vars = [];
        if (!empty($_POST)) {
            $todo = new Todo($_POST['name'], !empty($_POST['active']));
            $this->entityManager->persist($todo);
            $this->entityManager->flush();
            $this->messenger->addMessage(sprintf('New item added: %s', $todo->getName()));
            header('Location: ' . $this->router->generateUrl(self::class));
            exit;
        }
        $todoRepository = $this->entityManager->getRepository(Todo::class);
        $vars['items'] = $todoRepository->findAll();
        $content = $this->viewTemplate('todos', $vars);
        $title = 'Todo list';

        return $this->viewWrapper($title, $content);
    }
}
