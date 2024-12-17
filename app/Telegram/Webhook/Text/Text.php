<?php

namespace App\Telegram\Webhook\Text;

use App\Facades\Telegram;

class Text
{
    public function run()
    {
        Telegram::message($this->chat_id, 'Your message has been received.')->send();
    }
}
