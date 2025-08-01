<?php
use Utils\Articles;



if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        exit;
    }
// global $root_path2;
// $docMeta = require "root_path2/data/Kramp/desadv1248304-edit-modify-250709-krampsup.json";
$knowledgeCode = "desadv1248304-edit-modify-250709-krampsup";

// echo json_encode($docMeta);

$currentKnowledge = Articles::getArticle($knowledgeCode);
// echo 'currentKnowledge';
// var_dump($currentKnowledge);
// die();

if (empty($currentKnowledge)) {
    // TODO: Нерабочая логика. Заколовки к этому моменту отправлены. Они неизменяемы
    header('HTTP/1.0 404 not found');
    die();
}

header("Access-Control-Allow-Origin: *"); // Разрешить все домены
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Headers: X-Requested-With");
// echo $currentKnowledge;
echo json_encode($currentKnowledge);