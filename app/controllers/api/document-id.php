<?php
/**
document-id.php
 */

require_once __DIR__ . '/helpers.php';
require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

$idDoc = route_param('id','1248303');// '1248303'

try {
    $query = "SELECT * FROM documents LEFT JOIN users ON documents.userId = users.id WHERE documents.idDoc = ?";
    $currentKnowledge = gerDataForArticles($query,[$idDoc]);

    if ($currentKnowledge) {
        echo json_encode($currentKnowledge);
    } else {
        header("HTTP/1.0 404 Not Found");
    }
} catch (PDOException $e) {
    echo json_encode(["error"=>true, "message"=>$e->getMessage()]);
}
