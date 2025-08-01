<?php
$root_path = dirname($_SERVER['DOCUMENT_ROOT']);
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//var_dump($root_path);
require_once $root_path . '/init.php';
require_once $root_path . '/php/routers/index.php';



