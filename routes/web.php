<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('webhook-data', function() {
//    dd(\Illuminate\Support\Facades\Cache::get('webhook-data'));
//});
//
//\App\Telegram\Helpers\KeyboardButton::remove();
//dd(\App\Facades\Telegram::buttons(env('TELEGRAM_BOT_ID'), 'test', \App\Telegram\Helpers\KeyboardButton::$buttons)->send());
