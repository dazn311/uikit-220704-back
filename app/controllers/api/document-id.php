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
//        header("HTTP/1.0 404 Not Found");
        // Создаем поток
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Accept-language: en\r\n"
            )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents("https://edi-newsite.cislink.moscow{$_SERVER["REQUEST_URI"]}",false,$context);
        $auth = false;
        if ($result) {
            echo $result;
            die();
        } else {
            $auth = file_get_contents("https://edi-newsite.cislink.moscow/api/user/login?login=krampsup&passwd=krampsup",
                false,
            null,
            4,
            39);
            if ($auth) {
                $result = 0;
                $result = file_get_contents("https://edi-newsite.cislink.moscow{$_SERVER["REQUEST_URI"]}",true);
            }
        }
        if ($result) {
            echo $result;
        } else {
            echo json_encode([
                "error"=>true,
                "message"=>"Document not found",
                "query"=>$_SERVER["REQUEST_URI"],
                "result: " => $result,
                "auth: " => $auth,
//                "user" => $_SESSION['user'],
                "user" => $_SESSION,
            ]);
        }

    }
} catch (PDOException $e) {
    echo json_encode(["error"=>true, "message"=>$e->getMessage()]);
}
