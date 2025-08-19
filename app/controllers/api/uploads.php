<?php
require SHARED . '/createCookies.php';

header("Content-type: image/png,image/jpeg");
http_response_code(200);
header("HTTP/1.1 200 OK");

$fileUri = $_GET['path'] ?? "/uploads/avatars/2025/08/11/avatar-5.png";
$fileUri = substr($fileUri, 1);

echo file_get_contents($fileUri);
