<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//$text = (string)view('telegram.error', ['e' => $e]);
$token = env('TELEGRAM_BOT_API_TOKEN');
$id = (int)env('TELEGRAM_BOT_ID');

$http = Http::post("https://api.telegram.org/bot$token/setWebhook",
    [
        'url' => 'https://t-bot.com/api/webhook',
    ])->json();

dd($http);
