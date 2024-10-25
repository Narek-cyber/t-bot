<?php

namespace App\Telegram\Bot;

use Illuminate\Support\Facades\Http;

class Bot
{
    protected $data;
    protected $method;

    public function send()
    {
        $token = env('TELEGRAM_BOT_API_TOKEN');
        return Http::post("https://api.telegram.org/bot$token/$this->method", $this->data)->json();
    }
}
