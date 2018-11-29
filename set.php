<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

/*
    Clase que s'ocupa de crear el webhook. El webhook és el encarregat de escoltar les peticions que s'envien des del xat.
*/
$bot_api_key  = '715593089:AAEV1-91J1OWsAvInUF3eE0wBykL-qXWLns';
$bot_username = 'miku_loli_bot';
$hook_url     = 'https://orxatasoftware.com/bot/whk/hook.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}
?>