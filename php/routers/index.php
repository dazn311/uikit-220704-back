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
  // var_dump($queryPath);
  // var_dump(is_numeric($id));
  // var_dump(is_int($id));
  // var_dump($queryPath);
  // var_dump($id);
  
  // if (isset($_GET['isEditMode'])) {
  //   $isEditMode = $_GET['isEditMode'];
  // }
  switch (true) {
    case strpos($queryPath, '/api/document/new/') == 0:
      // var_dump($queryPath);// /api/document/new/invrpt?receiverPartyId=11192
      $type = $id;
      $id = 'new';
      $isEditMode = true;
      $router->add("/api/document/new/$type", function() {
        global $root_path2, $id;
        $isEditMode = 'true';
        // var_dump($isEditMode);
        require "$root_path2/pages/controllers/docs-controller.php";
      });
      break;
    case !empty($id) && is_numeric($id):
      $type = 'desadv';
      $isEditMode = false;
      if (isset($_GET['isEditMode'])) {
        $isEditMode = $_GET['isEditMode'];
      }
      $router->add("/api/document/$id", function() {
        global $root_path2, $isEditMode;
        require "$root_path2/pages/controllers/docs-controller.php";
      });
      break;
    // ... more cases
    default:
        // Code to execute if no case matches the expression
        break;
}
}

//api/filters/orders
if (isset($queryPathArr[0]) && strpos($queryPath, '/api/filters/') !== false) { // Проверяем, что это файл и ищем по имени
  $queryPath1 = explode('/', $queryPathArr[0]);
  $docType = end($queryPath1);//orders
  $suffNameFile = "filter-list-$docType";
  
  if (!empty($docType)) {
    $router->add("/api/filters/$docType", function() {
        global $root_path2, $suffNameFile;

        require "$root_path2/pages/controllers/filter-list-controller.php";
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

$router->add("/login", function() {
    global $root_path2;
    require "$root_path2/pages/controllers/login-controller.php";
});

$router->add("/api/user/info", function() {
    global $root_path2;
    require "$root_path2/pages/controllers/user-info-controller.php";
});

$router->dispatch($path);

