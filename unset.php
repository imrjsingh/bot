<?php
/*
    Clase que s'ocupa de deshabilitar el webhook. El webhook és el encarregat de escoltar les peticions que s'envien des del xat.

 */
// Load composer
require_once __DIR__ . '/vendor/autoload.php';
// Add you bot's API key and name
$bot_api_key  = '715593089:AAEV1-91J1OWsAvInUF3eE0wBykL-qXWLns';
$bot_username = 'miku_loli_bot';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);
    // Delete webhook
    $result = $telegram->deleteWebhook();
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e->getMessage();
}