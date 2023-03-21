<?php

require __DIR__ . "/vendor/autoload.php";

use Telegram\Telegram;
use Telegram\Keyboard;

$request = new Telegram("5617093148:AAF8ncMCwF8r3wxa6nSCRIrpD1XbCmeHxUs");

Telegram::sendMessage([
'chat_id'=>760582517,
'text'=>"test uchun",
'reply_markup'=>Keyboard::resizeKeyboard([['text'=>"test",'request_contact'=>true]])
]);