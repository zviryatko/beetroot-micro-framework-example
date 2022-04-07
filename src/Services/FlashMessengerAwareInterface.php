<?php

namespace App\Services;

interface FlashMessengerAwareInterface
{
    public function setFlashMessenger(FlashMessenger $messenger);
    public function getFlashMessenger(): FlashMessenger;
}
