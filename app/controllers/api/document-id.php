<?php
use Utils\Articles;
use Utils\App;
use Utils\Db;
use Utils\Router;
//echo 'document-id';
require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$db = App::get(Db::class);
$idDoc = Router::$route_params['id'];


$documents = $db->query("SELECT `fileName` FROM documents WHERE idDoc = ?",[$idDoc])->find();//false | object;

//var_dump($documents['fileName']);//desadv1248304-edit-Krampsup-250804.json

$knowledgeCode = isset($documents['fileName']) ? $documents['fileName']:  "desadv1248304-edit-Krampsup-250804.json";
//var_dump($knowledgeCode);
//die();
$ts='Kramp';

$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

echo json_encode($currentKnowledge);
