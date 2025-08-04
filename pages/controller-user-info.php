<?php
use Utils\Articles;
require $root_path2 . '/pages/response-header.php';
$knowledgeCode = "user-info.json";

$ts='Kramp';
$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

// header("Content-Type: application/json");
echo json_encode($currentKnowledge);
