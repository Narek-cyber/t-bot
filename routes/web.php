<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('webhook-data', function() {
    dd(\Illuminate\Support\Facades\Cache::get('webhook-data'));
});

//\App\Facades\Telegram::buttons(env('TELEGRAM_BOT_ID'), 'test', [
//    'inline_keyboard' => [
//        [
//            [
//                'text' => 'Button',
//                'callback_data' => '13',
//            ]
//        ]
//    ]
//])->send();
//dd(\App\Facades\Telegram::message(env('TELEGRAM_BOT_ID'), 'test')->send());

$buttons = [
    'inline_keyboard' => [
        [
            [
                'text' => 'Button',
                'callback_data' => '1',
            ]
        ]
    ]
];
\App\Facades\Telegram::buttons(env('TELEGRAM_BOT_ID'), 'test', $buttons)->send();
