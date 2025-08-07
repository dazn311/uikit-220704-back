<?php
use Utils\Articles;
global $root_path2, $docType, $suffNameFile;
// filter-list-controller
require $root_path2 . '/pages/controllers/response-header.php';
require $root_path2 . '/Lib/Utils/dirToArray.php';
// require $root_path2 . '/shared/createCookies.php';

$mode = 'read';
$type = 'desadv';
$isEditMode = false;

if (isset($_GET['type'])) {
  $type = $_GET['type'];
}

if (isset($_GET['mode'])) {
  $mode = $_GET['mode'];
}

if (isset($_GET['isEditMode'])) {
  $isEditMode = $_GET['isEditMode'];
}

// var_dump($docType);
// var_dump($suffNameFile);
// die(var_dump($docType));

$ts='Kramp';
$knowledgeCode = "filter-list-orders-Krampsup-250807.json";

$dir = $root_path2 . $_ENV['BASE_API_URL']; // Замените на нужный вам путь
$result = dirToArray($dir,'',$suffNameFile,$isEditMode,array());

// die(var_dump($result));
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