<?php

// $db = \Utils\App::get(\Utils\Db::class);

$id = $_GET['id'] ?? 0;

// $post = $db->query("SELECT * FROM posts WHERE id = ? LIMIT 1", [$id])->findOrFail();
/* if (!$post) {
    abort();
} */
$post = [
  'id'=> 2,
  'title'=> 'title 2',
  'excerpt'=> 'excerpt 2',
  'content'=> 'content 2',
];
$title = "My Blog :: {$post['title']}";
require_once VIEWS . '/posts/show.tpl.php';
