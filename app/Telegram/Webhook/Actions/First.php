<?php

namespace App\Telegram\Webhook\Actions;

use App\Facades\Telegram;
use App\Telegram\Helpers\InlineButton;

class First
{
    public function run()
    {
        $data = json_decode($this->request->input('callback_query')['data']);
        $chat_id = $this->request->input('callback_query')['from']['id'];
        $text = $this->request->input('callback_query')['message']['text'];
        $message_id = $this->request->input('callback_query')['message']['message_id'];
        $textButton1 = ($data->button_number == 1) ? 'First button ✅' : 'First button';
        $textButton2 = ($data->button_number == 2) ? 'Second button ✅' : 'Second button';
        InlineButton::add($textButton1, 'First', ['data' => 1]);
        InlineButton::add($textButton2, 'First', ['data' => 2]);
        Telegram::editButtons($chat_id, $text, InlineButton::$buttons, $message_id)->send();
    }
}
