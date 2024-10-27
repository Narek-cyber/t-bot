<?php

namespace App\Telegram\Webhook;

use App\Telegram\Webhook\Commands\Start;
use Illuminate\Http\Request;

class Realization
{
    protected const Commands = [
        '/start' => Start::class,
    ];

    public function take(Request $request)
    {
        if (isset($request->input('message')['entities'][0]['type'])) {
            if ($request->input('message')['entities'][0]['type'] == 'bot_command') {
                $command_name = explode(' ', $request->input('message')['text'])[0];
                return self::Commands[$command_name];
            }
        }
        return false;
    }
}
