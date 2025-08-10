<?php

$title = 'My Blog :: Home';

$db = \Utils\App::get(\Utils\Db::class);

$users = $db->query("SELECT * FROM users ORDER BY id DESC")->findAll();
$documents = $db->query("SELECT * FROM documents ORDER BY id DESC")->findAll();
// $posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->findAll();
//$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();
// $recent_posts = db()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();
$posts[] = [
  'id'=> 1,
  'title'=> 'title 1',
  'excerpt'=> 'excerpt 1',
];

$posts[] = [
  'id'=> 2,
  'title'=> 'title 2',
  'excerpt'=> 'excerpt 2',
];

$recent_posts[] = [
  'id'=> 2,
  'title'=> 'title 2',
];

require_once VIEWS . '/posts/index.tpl.php';
