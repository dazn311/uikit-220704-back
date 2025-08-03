<?php
use Utils\Articles;
global $root_path2;
require $root_path2 . '/pages/response-header.php';
require $root_path2 . '/Lib/Utils/dirToArray.php';

$ts='Kramp';
$knowledgeCode = "desadv1248304-edit-modify-250709-krampsup.json";

$dir = $root_path2 . $_ENV['BASE_API_URL']; // Замените на нужный вам путь
$result = dirToArray($dir,'','1248304',array());

foreach ($result as $keyTS => $valueTs) {
  if (!empty($valueTs['name'])) {      
      $ts = $valueTs['name'];
      $knowledgeCode = $valueTs['value'];
  }
}

$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

if (empty($currentKnowledge)) {
  header("Content-Type: application/json");
  // header("Access-Control-Allow-Origin: *");
    // TODO: Нерабочая логика. Заколовки к этому моменту отправлены. Они неизменяемы
    echo json_encode($currentKnowledge);
}


header("Content-Type: application/json");
// header("Access-Control-Allow-Origin: *");
echo json_encode($currentKnowledge);