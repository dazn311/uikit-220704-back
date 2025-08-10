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



// api cislink;
// api/user/info
$router->get('api/user/info', 'api/user-info.php');

// api/document/new/invrpt?isEditMode=true
// api/document/1248923?isEditMode=true
$router->get('api/document/(?<id>\d+)', 'api/document-id.php');
$router->get('api/document/new/(?<type>\w{6})', 'api/document-type.php');

///api/user/sessionPing?lastStamp=0m
$router->get('api/user/sessionPing', 'api/sessionPing.php');
//dump($router->routes);

// User
$router->add('register', 'users/register.php', ['get', 'post'])->only('guest');
//$router->post('register', 'users/store.php')->only('guest');
$router->add('login', 'users/login.php', ['get', 'post'])->only('guest');
$router->get('logout', 'users/logout.php')->only('auth');
$router->get('user', 'users/index.php')->only('auth');
