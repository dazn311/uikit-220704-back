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
  echo "cookie daz: " . $_COOKIE['daz'];
}

if (isset($_COOKIE['daz22'])) {
  echo "cookie daz22: " . $_COOKIE['daz22'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
</head>
<body>
  <form action="" >
    <input type="text" name="login" >
    <input type="password" name="password" >
  </form>
</body>
</html>