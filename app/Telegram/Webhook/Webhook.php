<?php

namespace App\Telegram\Webhook;

use App\Facades\Telegram;
use Illuminate\Http\Request;

class Webhook
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run()
    {
        return Telegram::message((int)env('TELEGRAM_BOT_ID'), 'Failed to process message!')->send();
    }
}
