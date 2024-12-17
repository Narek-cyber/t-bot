<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});
Route::any('api/authenticate', [LoginController::class, 'authenticate']);
//Route::get('webhook-data', function() {
//    dd(\Illuminate\Support\Facades\Cache::get('webhook-data'));
//});
//
//\App\Telegram\Helpers\KeyboardButton::remove();
//dd(\App\Facades\Telegram::buttons(env('TELEGRAM_BOT_ID'), 'test', \App\Telegram\Helpers\KeyboardButton::$buttons)->send());

//Route::get('/', function () {
//    $text = 'message';
//    \App\Telegram\Helpers\InlineButton::add('First button ✅', 'action', ['data' => 1]);
//    dd(\App\Facades\Telegram::editButtons(env('TELEGRAM_BOT_ID'), $text, \App\Telegram\Helpers\InlineButton::$buttons, 134)->send());
//});
