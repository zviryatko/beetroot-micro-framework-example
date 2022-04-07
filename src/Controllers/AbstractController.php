<?php

namespace App\Controllers;

use App\Services\FlashMessengerAwareInterface;
use App\Services\FlashMessengerAwareTrait;

abstract class AbstractController implements FlashMessengerAwareInterface
{
    use FlashMessengerAwareTrait;

    abstract public function view();

    public function viewWrapper(string $title, string $content)
    {
        $messages = $this->getFlashMessenger()->getMessages();
        $time = time();
        ob_start();
        require __DIR__ . '/../templates/html.php';;
        return ob_get_clean();
    }

    public function viewTemplate(string $template, array $variables = [])
    {
        $template_file = __DIR__ . '/../templates/' . $template . '.html.php';
        if (!file_exists($template_file)) {
            $template_file = './templates/not-found.html.php';
        }
        ob_start();
        extract($variables);
        require $template_file;
        $output = ob_get_clean();
        return $output;
    }
}
