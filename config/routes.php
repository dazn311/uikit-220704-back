<?php

/** @var $router */

const MIDDLEWARE = [
    'auth' => \Utils\middleware\Auth::class,
    'guest' => \Utils\middleware\Guest::class,
];

// Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

// Pages
$router->get('about', 'about.php');
$router->get('contact', 'contact.php');

// User
$router->add('register', 'users/register.php', ['get', 'post'])->only('guest');
//$router->post('register', 'users/store.php')->only('guest');
$router->add('login', 'users/login.php', ['get', 'post'])->only('guest');
$router->get('logout', 'users/logout.php')->only('auth');
$router->get('user', 'users/index.php')->only('auth');

// api cislink;
// api/user/info
$router->get('api/user/info', 'api/user-info.php');
// api/document/1248923?isEditMode=true
//$urlDocument ='/api/document/1248923?isEditMode=true';
//$pattern = '#^/api/document/(?<id>\d+)\?isEditMode=true$#';
//var_dump(preg_match($pattern, $urlDocument, $match));// 1;
//echo '<pre>';
//print_r($match);
//Array
//(
//    [0] => /api/document/1248923?isEditMode=true
//    [id] => 1248923
//    [1] => 1248923
//)
//echo '</pre>';
$router->get('api/document/(?<id>\d+)', 'api/document-id.php');

//dump($router->routes);
