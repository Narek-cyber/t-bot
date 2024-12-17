<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Telegram\Helpers\InlineButton;

class EditProfile
{
    public function run()
    {
        $name = $this->request->input('message')['from']['first_name'];
        InlineButton::add('👤 Sex', 'EditUser', ['sex' => 1], 1);
        InlineButton::add('🦉 Age', 'EditUser', ['age' => 1], 1);
        InlineButton::add('🕸 City', 'EditUser', ['city' => 1], 2);
        InlineButton::add('🏴‍☠️ Country', 'EditUser', ['country' => 1], 3);
        return Telegram::buttons((int)env('TELEGRAM_BOT_ID'), 'Editing profile ' . $name, InlineButton::$buttons)->send();
    }
}
