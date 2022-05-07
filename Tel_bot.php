<?php

function Telegram($message)
{
    $apiToken = "5294983789:AAF9XVGHoesHH5NM9U3ldyYsnLGfZgJhhcY";
    $data = [
        'chat_id' => '@ARBITERAGER55', //-1001737089905
        'text' => $message
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
}
?>