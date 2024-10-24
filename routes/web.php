<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//$text = (string)view('telegram.error', ['e' => $e]);
$token = env('TELEGRAM_BOT_API_TOKEN');
$id = (int)env('TELEGRAM_BOT_ID');

$http = Http::post("https://api.telegram.org/bot$token/sendMessage",
    [
        'chat_id' => $id,
        'text' => 'Hello',
        'parse_mode' => 'HTML',
        'reply_markup' => [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'First Button',
                        'callback_data' => '1',
                    ],
                    [
                        'text' => 'Second Button',
                        'url' => 'https://web.telegram.org/a/',
                    ],
                ]
            ],
        ],
    ])->json();

dd($http);
