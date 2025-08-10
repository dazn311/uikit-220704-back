<?php
require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';
http_response_code(200);
header("HTTP/1.1 200 OK");
echo json_encode(array('data' => ['time' => 12.34]));
