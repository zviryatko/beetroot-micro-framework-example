<?php

namespace App\Services;

class FlashMessenger
{
    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
    }

    public function addMessage(string $message)
    {
        $_SESSION['messages'][] = $message;
    }

    public function getMessages()
    {
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);
        return $messages;
    }
}
