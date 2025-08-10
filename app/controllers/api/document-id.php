<?php
use Utils\Articles;
use Utils\App;
use Utils\Db;

require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$db = App::get(Db::class);

$idDoc = route_param('id','1248303');// '1248303'

$documents = $db->query("SELECT `fileName`, `userId` FROM documents WHERE idDoc = ?",[$idDoc])->find();//false | object;
$user = $db->query("SELECT `name` FROM users WHERE id = ?", [$documents['userId']])->find();

//SELECT * FROM documents d  WHERE idDoc = ? JOIN users u ON d.userId = u.id;
//SELECT * FROM users u JOIN documents d ON u.id = d.userId;
//$user3 = $db->query("SELECT * FROM documents d  WHERE idDoc = $idDocInt JOIN users u ON d.userId = u.id;");//->find();

$ts = $user['name'] ?? 'Kramp';
$knowledgeCode = $documents['fileName'] ?? "desadv1248304-edit-Krampsup-250804.json";
$currentKnowledge = Articles::getArticle($ts, $knowledgeCode);

echo json_encode($currentKnowledge);
