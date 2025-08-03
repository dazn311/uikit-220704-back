<?php
use Utils\Articles;
global $root_path2;
require $root_path2 . '/pages/response-header.php';
// require $root_path2 . '/Lib/Utils/getFileNameFromDir.php';

$knowledgeCode = "desadv1248304-edit-modify-250709-krampsup";

$currentKnowledge = Articles::getArticle($knowledgeCode);

if (empty($currentKnowledge)) {
    // TODO: Нерабочая логика. Заколовки к этому моменту отправлены. Они неизменяемы
    echo json_encode($currentKnowledge);
}


// header("Content-Type: application/json");
// getFileNameFromDir();

echo json_encode($currentKnowledge);