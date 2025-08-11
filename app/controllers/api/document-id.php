<?php
use Utils\Articles;
use Utils\App;
use Utils\Db;

require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$db = App::get(Db::class);

$idDoc = route_param('id','1248303');// '1248303'

$documents = $db->query("SELECT * FROM  documents LEFT JOIN  users ON documents.userId = users.id WHERE documents.idDoc = ?",[$idDoc]);

$ts = 'Kramp';
if ($documents) {
    $documents = $documents->find();
    $ts = $documents['name'] ?? 'Kramp';
}

$knowledgeCode = $documents['fileName'] ?? "desadv1248304-edit-Krampsup-250804.json";
$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

echo json_encode($currentKnowledge);
