<?php
// ini_set("session.cookie_secure", 1);
// $cookieParams = session_get_cookie_params();
session_start();
// header('Cookie: PHPSESSID= ' . session_id() . '; SameSite=None; Secure');
if (str_contains(session_id(),'SSO')) {
  header('Set-Cookie: PHPSESSID=' . session_id() . '; SameSite=None; Secure');
} else {
  header('Set-Cookie: PHPSESSID=' . 'SSO-' . session_id() . '; SameSite=None; Secure');
}

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Теперь переменные из .env доступны
$databaseUrl = $_ENV['DATABASE_URL'];




