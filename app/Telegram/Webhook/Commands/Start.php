<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Telegram\Webhook\Webhook;

class Start extends Webhook
{
    public function run()
    {
        return Telegram::message((int)env('TELEGRAM_BOT_ID'), 'Hi! Thanks for subscribing.')->send();
    }
}
