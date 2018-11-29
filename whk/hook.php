<?php

/**
 * Telegram bot works with Program O
 * Tutorial Link: https://www.lifeofgeek.com/fully-responsive-telegram-bot-php-tutorial/
 */
define('BOT_TOKEN', '715593089:AAEV1-91J1OWsAvInUF3eE0wBykL-qXWLns'); //Replace with your bot token
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
// Program O Params
$bot_id = '1';					//Program O bot ID
$siteurl = 'https://bot.orxatasoftware.com/Program-O'; 	// Site url including https where program o installed
$convo_id = 'miku-b'; 				//Any string to save conversation log
	
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$username =  $update["message"]["chat"]["username"];
	$msg = trim($message);
    $result = file_get_contents("" .$siteurl. "/chatbot/conversation_start.php?bot_id=" . $bot_id . "&say=" . urlencode($msg) . "&convo_id=" . $convo_id . "&format=json");
    $jsonop= json_decode($result);
    if($result != '') {    
    	// compose reply
	$reply =  $jsonop->botsay;
		
	// send reply
	$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply."&username=".$username;
	file_get_contents($sendto);
    }