<?php

if (!check_auth()) {
    redirect('/');
}

use Utils\App;
use Utils\Db;

$db = App::get(Db::class);

$users = $db->query("SELECT `name` FROM users;");

if ($users) {
    $users = $users->findAll();
}
if (!$users) {
    $users = [];
}
//dd($users);
$title = "My Blog :: New document";
require_once VIEWS . '/documents/create.tpl.php';
