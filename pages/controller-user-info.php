<?php
use Utils\Articles;

$knowledgeCode = "user-info";

$currentKnowledge = Articles::getArticle($knowledgeCode);

header("Content-Type: application/json");
echo json_encode($currentKnowledge);
