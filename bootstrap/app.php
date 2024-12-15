<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Http;

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
        $exceptions->reportable(function (Throwable $e) {
            $text = (string) view('telegram.error', ['e' => $e]);
            Http::post('https://api.telegram.org/bot8144975184:AAF18SNkPKqyusmmoIIJnSjvsk18Rfs6oec/sendMessage',
                [
                    'chat_id' => 7884516736,
                    'text' => $text,
                    'parse_mode' => 'HTML',
                ])->json();
        });
    })->create();
