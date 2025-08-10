<?php
use Utils\Articles;
use Utils\App;
use Utils\Db;

require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$db = App::get(Db::class);

$type = route_param('type','desadv');

$documents = $db->query("SELECT `fileName`, `userId` FROM documents WHERE `type` = ? AND `idDoc` = ?",[$type,'new'])->find();//false | object;
$user = $db->query("SELECT `name` FROM users WHERE id = ?", [$documents['userId']])->find();

$ts = $user['name'] ?? 'Kramp';
$knowledgeCode = $documents['fileName'] ?? "invrpt-new-edit-Krampsup-250807.json";
$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

echo json_encode($currentKnowledge);
