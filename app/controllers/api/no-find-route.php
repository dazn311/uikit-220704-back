<?php
/**
    no-find-route
 */

require_once __DIR__ . '/helpers.php';
require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

try {
//    var_dump( $_SERVER['HTTP_COOKIE']);
    $cookie_string = 'Cookie: EDI.Web.Api.Session=CfdQJqckRE%2B3K6';
    // Создаем поток
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" . "Accept: application/json\r\n" . $cookie_string . "\r\n"
        )
    );

    $context = stream_context_create($opts);
//    $userInfo = file_get_contents("https://edi-newsite.cislink.moscow/api/user/info");
    $userInfo = file_get_contents("https://edi-newsite.cislink.moscow/api/user/info",false,$context);

    $res31 = getHeader();

    if (!$userInfo) {
        $auth = file_get_contents("https://edi-newsite.cislink.moscow/api/user/login?login=krampsup&passwd=krampsup");
        $res39 = getHeader();

        if ($auth) {//$res39['is401'] &&
            $result   = file_get_contents("https://edi-newsite.cislink.moscow{$_SERVER["REQUEST_URI"]}");
            $res44 = getHeader();
            if (!$res44['is401']) {
                echo $result;
                die();
            } else {
                echo json_encode([
                    "error"=>true,
                    "message"=>"Document not found",
                    "query"=>$_SERVER["REQUEST_URI"],
                    "result: " => $result,
//            "auth: " => $auth,
//                "user" => $_SESSION['user'],
                    "user" => $_SESSION,
                ]);
            }
        }
    }

//    $auth = false;

//    }
} catch (PDOException $e) {
    echo json_encode(["error"=>true, "message"=>$e->getMessage()]);
}
