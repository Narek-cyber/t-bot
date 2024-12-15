<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$http = Http::post('https://api.telegram.org/bot8144975184:AAF18SNkPKqyusmmoIIJnSjvsk18Rfs6oec/sendMessage',
    [
        'chat_id' => 7884516736,
        'text' => 'test',
        'parse_mode' => 'HTML',
        'reply_markup' => [
            'remove_keyboard' => true,
        ]
    ])->json();
dd($http);
