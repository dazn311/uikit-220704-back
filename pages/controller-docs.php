<?php
use Utils\Articles;
global $root_path2;
// $id = session_id();

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        exit;
    }

if (session_status() === PHP_SESSION_ACTIVE) {
    $sessionId = session_id();
    if (!$sessionId) {
      die("Идентификатор сессии: " . $sessionId);
    }
    // echo "Идентификатор сессии: " . $sessionId;
}

$knowledgeCode = "desadv1248304-edit-modify-250709-krampsup";

$currentKnowledge = Articles::getArticle($knowledgeCode);

if (empty($currentKnowledge)) {
    // TODO: Нерабочая логика. Заколовки к этому моменту отправлены. Они неизменяемы
    header('HTTP/1.0 404 not found');
    die();
}

require $root_path2 . '/pages/response-header.php';

echo json_encode($currentKnowledge);