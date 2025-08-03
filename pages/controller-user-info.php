<?php
// ob_start();
// header("Access-Control-Allow-Origin: *");
// header('Access-Control-Allow-Credentials: true');
// header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// // header('Access-Control-Max-Age: 86400');    // cache for 1 day
// header('Content-Type: application/json');
use Utils\Articles;

// $id = session_id();
// require $root_path2 . '/Lib/Utils/cors.php';
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     header("Access-Control-Allow-Origin: localhost:3000"); // Разрешить все домены
//     header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//     header("Access-Control-Allow-Headers: Content-Type, Authorization");
//     exit;
// }
// die(var_dump($_SERVER));
// if (session_status() === PHP_SESSION_ACTIVE) {
//     $sessionId = session_id();
//     if (!$sessionId) {
//       die("Идентификатор сессии: " . $sessionId);
//     }
//     // echo "Идентификатор сессии: " . $sessionId;
// }

$knowledgeCode = "user-info";

$currentKnowledge = Articles::getArticle($knowledgeCode);

// require $root_path2 . '/pages/response-header.php';
// require $root_path2 . '/Lib/Utils/cors.php';
// Если не было отправлено ни одного заголовка, то отправить один
// if (!headers_sent()) {
//     header('Location: http://www.example.com/');
//     exit;
// }
header("Content-Type: application/json");
echo json_encode($currentKnowledge);

// var_dump(headers_list());
// ob_end_flush();