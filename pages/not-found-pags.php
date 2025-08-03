<?php
/**
* not-found-pags
*/
// header("Content-Type: application/json");
global $root_path2;
require $root_path2 . '/pages/response-header.php';

$currentKnowledge = ['error' =>  "Page not found: $path"];
echo json_encode($currentKnowledge);
