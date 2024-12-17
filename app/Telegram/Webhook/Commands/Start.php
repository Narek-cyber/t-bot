<?php

namespace App\Telegram\Webhook\Commands;

use App\Facades\Telegram;
use App\Models\Product;
use App\Models\User;
use App\Telegram\Helpers\InlineButton;
use App\Telegram\Webhook\Webhook;

class Start extends Webhook
{
    public function run()
    {
        $product_id = explode('=', $this->request->input('message')['text'])[1];
        $product = Product::query()->find($product_id);
        $urls = $product->images()->get()->map(fn($item) => 'https://telegram.povyshev-course.com/storage/images/'.$item->file_name)->toArray();
        Telegram::album($this->chat_id, $urls)->send();
        $text = (string)view('telegram.product', ['product' => $product]);
        $data = [
            'product_id' => $product_id,
        ];
        InlineButton::add('Order now', 'NewOrder', $data, 1);
        InlineButton::add('Order tomorrow', 'NewOrder', $data, 1);
        InlineButton::add('Select by date', 'NewOrder', $data, 2);
        Telegram::buttons($this->chat_id, $text, InlineButton::$buttons)->send();
        return Telegram::message((int)env('TELEGRAM_BOT_ID'), 'Hi! Thanks for subscribing.')->send();
    }

//    public function run()
//    {
//        $token = explode('/start ', $this->request->input('message')['text'])[1];
//        User::where('telegram_token', $token)->update([
//            'telegram_id' => $this->request->input('message')['from']['id'],
//            'telegram_username' =>$this->request->input('message')['from']['username'],
//        ]);
//        return Telegram::message($this->chat_id, 'Привет! Спасибо что подписался')->send();
//    }
}
