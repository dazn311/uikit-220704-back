<?php
use Utils\Articles;
global $root_path2;
require $root_path2 . '/pages/response-header.php';
// $id = session_id();

// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     header("Access-Control-Allow-Origin: *");
//     header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//     header("Access-Control-Allow-Headers: Content-Type, Authorization");
//     exit;
// }

$knowledgeCode = "desadv1248304-edit-modify-250709-krampsup";

$currentKnowledge = Articles::getArticle($knowledgeCode);

if (empty($currentKnowledge)) {
    // TODO: Нерабочая логика. Заколовки к этому моменту отправлены. Они неизменяемы
    echo json_encode($currentKnowledge);
}


// header("Content-Type: application/json");
echo json_encode($currentKnowledge);