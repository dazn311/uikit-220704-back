<?php
/**
    no-find-route
 */

require_once __DIR__ . '/helpers.php';
require SHARED . '/createCookies.php';
require SHARED . '/response-header-api.php';

try {
    // Создаем поток
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" . "Accept: application/json\r\n" .
                "Cookie: _ym_uid=1732775993317949520; _ym_d=1754618464; _ym_isad=2; Cislink.SSO.Cookie=0ypMaAocRpkEvdr3QRnubwXjUfu7SOaCofeEptw6; EDI.Web.Api.Session=CfDJ8APT40tFQGJAuei3t3s8RsfFfptDBQjCDd4uoW1Si910hgmNbqaZu%2FmRZHDxNhC7qEREgVMtEvqPyZG27GTVkQq54TxBGiWwi1K8ZO9EFa0b5X9ZcMZaofUCDyp6mOLPnTOZN8fekqTfDQRpIKhGRYyqMkyoM2eMThxvMz4S07sH\r\n"
        )
    );

    $context = stream_context_create($opts);
    $result = file_get_contents("https://edi-newsite.cislink.moscow{$_SERVER["REQUEST_URI"]}",false,$context);

    if ($result) {
        echo $result;
        die();
    }
    echo json_encode([
        "error"=>true,
        "message"=>"Document not found",
        "query"=>$_SERVER["REQUEST_URI"],
        "result: " => $result,
        "user" => $_SESSION,
    ]);
} catch (PDOException $e) {
    echo json_encode(["error"=>true, "message"=>$e->getMessage()]);
}
