<?php

use JetBrains\PhpStorm\NoReturn;
use \Utils\Router;
use Utils\Db;
use Utils\App;
function dump($data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function print_arr($data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

#[NoReturn] function dd($data): void
{
    dump($data);
    die;
}

#[NoReturn] function abort($code = 404, $title = '404 - Not found'): void
{
    http_response_code($code);
    require VIEWS . "/errors/{$code}.tpl.php";
    die;
}
/**
load fillable from $_POST , $_GET;
 */
function load($fillable = [], $isPost = true): array
{
  $loadData = $isPost ? $_POST : $_GET;

  $data = [];
  foreach ($fillable as $key) {
    $value = $loadData[$key] ?? null;
    if (isset($value)) {
      $data[$key] = is_array($value) ? $value : trim($value);
    } else {
      $data[$key] = '';
    }
  }

  return $data;
}

function old($fieldName): string
{
    return isset($_POST[$fieldName]) ? h($_POST[$fieldName]) : '';
}

function oldCheck($fieldName): string
{
    if (isset($_POST[$fieldName])) {
       return $_POST[$fieldName] == 'on' ? 'checked' : '';
    }
    return '';
}

function h($str): string
{
    return htmlspecialchars($str, ENT_QUOTES);
}

#[NoReturn] function redirect($url = ''): void
{
    if ($url) {
        $redirect = $url;
    } else {
        $redirect = $_SERVER['HTTP_REFERER'] ?? PATH;
    }
    header("Location: {$redirect}");
    die;
}

function get_alerts(): void
{
    if (!empty($_SESSION['success'])) {
        require_once VIEWS . '/incs/alert_success.php';
        unset($_SESSION['success']);
    }
    if (!empty($_SESSION['error'])) {
        require_once VIEWS . '/incs/alert_error.php';
        unset($_SESSION['error']);
    }
}

function db(): Db
{
    return App::get(Db::class);
}

function check_auth(): bool
{
    return isset($_SESSION['user']);
}

function get_file_ext($file_name): false|string
{
    $file_ext = explode('.', $file_name);
    return end($file_ext);
}

function route_params(): array
{
    return Router::$route_params;
}
function route_param(string $key, $default = null): string|null
{
    return Router::$route_params[$key] ?? $default;
}