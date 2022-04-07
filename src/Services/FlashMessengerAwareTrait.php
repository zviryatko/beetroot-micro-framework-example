<?php

namespace App\Services;

trait FlashMessengerAwareTrait
{
    protected FlashMessenger $messenger;

    public function setFlashMessenger(FlashMessenger $messenger)
    {
        $this->messenger = $messenger;
    }

    public function getFlashMessenger(): FlashMessenger
    {
        return $this->messenger;
    }

}
