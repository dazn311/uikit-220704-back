<?php
require SHARED . '/createCookies.php';
//require SHARED . '/response-header-api.php';
require CORE . '/sendPushMessage.php';

$auth = [
    "VAPID" => [
        "subject" => "mailto:support@homesstaging.ru",
        "publicKey" => "BAfNaGRIukwj_jcTkw8ymqJiWg9QOZ5wKt3famaKgNz_K5g583NVDD6y1FVKUv00iaaCiNkr4VZ4OE3ecmDz9ro",
        "privateKey" => "44ak5rjCth13DvU3C0F-JPKhufc11C3c3Hc7U0en9R8",
    ],
];

http_response_code(200);
header("HTTP/1.1 200 OK");
$json_data = file_get_contents('php://input');
//echo json_encode(["token" => "0"]);

//sleep(2);
sendPushMessage($json_data,$auth, '{"title":"Hi, Natusya","body":"how a you? ","url":"chat?userId=2"}');

