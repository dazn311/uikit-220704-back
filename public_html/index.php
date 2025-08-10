<?php

session_start();
use Utils\Router;

require_once __DIR__ . '/../vendor/autoload.php';
require dirname(__DIR__) . '/config/config.php';
require_once __DIR__ . '/bootstrap.php';
require CORE . '/funcs.php';

$router = new Router();
require CONFIG . '/routes.php';
try {
    $router->match();
} catch (Exception $e) {
    echo $e->getMessage();
}

// $root_path = dirname($_SERVER['DOCUMENT_ROOT']);
// $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// //var_dump($root_path);
// require_once $root_path . '/Lib/Utils/cors.php';
// require_once $root_path . '/init.php';
// require_once $root_path . '/php/routers/index.php';



