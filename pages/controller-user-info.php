<?php
use Utils\Articles;

$knowledgeCode = "user-info.json";

$ts='Kramp';
$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

header("Content-Type: application/json");
echo json_encode($currentKnowledge);
