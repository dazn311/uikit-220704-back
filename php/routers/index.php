<?php

use php\routers\Router;

$request = htmlspecialchars(explode("?", $_SERVER['REQUEST_URI'])[0], ENT_QUOTES);
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//read mode;
//https://localhost:3000/tools/docmeta/?id=1248304&type=desadv&mode=edit
$queryPath = $_SERVER["REQUEST_URI"];//  /api/document/1248304?isEditMode=true
$queryPathArr = explode('?', $queryPath);

$root_path = dirname(__DIR__);
$root_path2 = dirname($_SERVER['DOCUMENT_ROOT']);
$root_doc = $_SERVER['DOCUMENT_ROOT'];
$router = new Router();

if (isset($queryPathArr[0]) && strpos($queryPath, '/api/document/') !== false) { // Проверяем, что это файл и ищем по имени
  $queryPath1 = explode('/', $queryPathArr[0]);
  $id = end($queryPath1);
  
  if (!empty($id)) {
    $router->add("/api/document/$id", function() {
        global $root_path2;
        require "$root_path2/pages/controllers/docs-controller.php";
    });
  }
}

$router->add("/", function() {
    global $root_path2;
    require "$root_path2/pages/controllers/home-controller.php";
});

$router->add("/info", function() {
    global $root_path2;
    require "$root_path2/php/index.php";
});

$router->add("/api/user/info", function() {
    global $root_path2;
    require "$root_path2/pages/controllers/user-info-controller.php";
});

$router->dispatch($path);

