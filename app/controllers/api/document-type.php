<?php
use Utils\Articles;
use Utils\App;
use Utils\Db;

require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$db = App::get(Db::class);

$type = route_param('type','desadv');

$documents = $db->query("
    SELECT *
    FROM  documents
    LEFT JOIN  users ON documents.userId = users.id
    WHERE documents.type = ? AND documents.idDoc = ?",[$type,'new']);

$ts = 'Kramp';
if ($documents) {
    $documents = $documents->find();
    $ts = $documents['name'] ?? 'Kramp';
}

$knowledgeCode = $documents['fileName'] ?? "invrpt-new-edit-Krampsup-250807.json";
$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

echo json_encode($currentKnowledge);
