<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Http;
//use Throwable;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (\Throwable $e) {
            $text = (string)view('telegram.error', ['e' => $e]);
            $token = env('TELEGRAM_BOT_API_TOKEN');
            $id = (int)env('TELEGRAM_BOT_ID');

            Http::post("https://api.telegram.org/bot$token/sendMessage", [
                'chat_id' => $id,
                'text' => $text,
                'parse_mode' => 'HTML',
            ])->json();
        });
    })->create();
