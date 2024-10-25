<?php

namespace App\Telegram\Bot;

class Factory
{
    private Message $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function __call(string $name, array $arguments)
    {

        foreach ($this as $key => $prop) {
            if (method_exists($this->$key, $name)) {
                return call_user_func_array([$this->$key, $name], $arguments);
            }
        }
        throw new \Exception('No such method  ' . $name . ' was found');
    }
}
