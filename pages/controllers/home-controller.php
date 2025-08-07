<?php
$_SESSION['userName'] = "dazn311";
global $root_path2, $id;
// home-controller.php
// require $root_path2 . '/pages/controllers/response-header.php';
require $root_path2 . '/shared/createCookies.php';

$mode = 'read';
$type = 'desadv';
$isEditMode = false;

if (isset($_SESSION['userName'])) {
  require $root_path2 . '/pages/views/home.php';
}

if (isset($_COOKIE['daz'])) {
  echo $_COOKIE['daz'];
}

if (isset($_COOKIE['daz22'])) {
  echo $_COOKIE['daz22'];
}
