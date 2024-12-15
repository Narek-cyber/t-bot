<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

dd(\Illuminate\Support\Facades\Http::post('https://api.telegram.org/bot8144975184:AAF18SNkPKqyusmmoIIJnSjvsk18Rfs6oec/sendMessage',
    [
        'chat_id' => 7884516736,
        'text' => 'test message',
    ])->json()
);
