<?php

use php\routers\Router;

//require "./Router.php";
$request = htmlspecialchars(explode("?", $_SERVER['REQUEST_URI'])[0], ENT_QUOTES);
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//print_r($path);

$root_path = dirname(__DIR__);
$root_path2 = dirname($_SERVER['DOCUMENT_ROOT']);
$root_doc = $_SERVER['DOCUMENT_ROOT'];
$router = new Router();

$router->add("/", function() {
    global $root_path2;
    require "$root_path2/pages/controller-docs.php";
});

$router->add("/info", function() {
    global $root_path2;
    echo "$root_path2/php/index.php";
});

$router->add("/api/user/info", function() {
    global $root_path2;
    require "$root_path2/pages/user-info.php";
});

//var_dump($path);
//echo '$root_path2: ' . $root_path2;
//echo '<div>'. '$path: ' . $path . '</div>';
$router->dispatch($path);

