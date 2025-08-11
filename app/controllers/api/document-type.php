<?php
/**
document-type.php
 */
require 'helpers.php';
require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$type = route_param('type','desadv');

try {
    $query = "SELECT * FROM  documents LEFT JOIN  users ON documents.userId = users.id WHERE documents.type = ? AND documents.idDoc = ?";
    $currentKnowledge = gerDataForArticles($query,[$type,'new']);

    if ($currentKnowledge) {
        echo json_encode($currentKnowledge);
    } else {
        header("HTTP/1.0 404 Not Found");
        echo json_encode(["error"=>true, "message"=>"Document not found"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error"=>true, "message"=>$e->getMessage()]);
}
