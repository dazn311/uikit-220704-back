<?php
// ini_set("session.cookie_secure", 1);
// $cookieParams = session_get_cookie_params();
session_start();
header('Set-Cookie: PHPSESSID= ' . session_id() . '; SameSite=None; Secure');
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Теперь переменные из .env доступны
$databaseUrl = $_ENV['DATABASE_URL'];




