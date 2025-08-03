<?php
// ini_set("session.cookie_secure", 1);
$cookieParams = session_get_cookie_params();
$cookieParams['samesite'] = 'None'; // or 'Strict', or 'None', or 'Lax'
session_set_cookie_params($cookieParams);
session_start();
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Теперь переменные из .env доступны
$databaseUrl = $_ENV['DATABASE_URL'];




