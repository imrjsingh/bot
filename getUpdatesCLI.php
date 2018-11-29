<?php
require __DIR__ . '/vendor/autoload.php';

/*
    Clase que es dedica a accedir a la base de dades del servidor.
*/
$bot_api_key  = '715593089:AAEV1-91J1OWsAvInUF3eE0wBykL-qXWLns';
$bot_username = 'miku_loli_bot';

$mysql_credentials = [
   'host'     => 'localhost',
   'port'     => 3306, // optional
   'user'     => 'orxataso_miku',
   'password' => '865412981995mlb',
   'database' => 'orxataso_mikubot',
];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Enable MySQL
    $telegram->enableMySql($mysql_credentials);

    // Handle telegram getUpdates request
    $telegram->handleGetUpdates();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
     echo $e->getMessage();
}