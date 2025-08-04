<?php
use Utils\Articles;
global $root_path2;
global $id;//1248304
require $root_path2 . '/pages/response-header.php';
require $root_path2 . '/Lib/Utils/dirToArray.php';
// die(var_dump($id));
$ts='Kramp';
$knowledgeCode = "desadv$id-edit-modify-250709-krampsup.json";

$dir = $root_path2 . $_ENV['BASE_API_URL']; // Замените на нужный вам путь
$result = dirToArray($dir,'',$id,array());

foreach ($result as $keyTS => $valueTs) {
  if (!empty($valueTs['name'])) {      
      $ts = $valueTs['name'];
      $knowledgeCode = $valueTs['value'];
  }
}

$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

if (empty($currentKnowledge)) {
    // TODO: Нерабочая логика. Заколовки к этому моменту отправлены. Они неизменяемы
    echo json_encode($currentKnowledge);
}

echo json_encode($currentKnowledge);