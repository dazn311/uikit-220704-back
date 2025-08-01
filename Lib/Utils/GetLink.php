<?php

namespace Utils;
require 'print_info.php';
class GetLink
{
     public array $linkAlias = [
        'main-page' => '/',
        'auth-page' => '/auth',
    ];
    public function htmlUrl(string $url): string
    {
        return $this->linkAlias[htmlspecialchars($url, ENT_QUOTES)];
    }
    public static function get(string $linkName): string
    {
//        $request = htmlspecialchars(explode('?', $_SERVER["REQUEST_URI"])[0],ENT_QUOTES);
//        echo "<br>";
//        echo 'request: ' . $request;
//        echo "<br>";
        print_info('[Lib\Utils] htmlUrl: ' . (new GetLink)->htmlUrl($linkName));
//        echo 'Lib\Utils htmlUrl: ' . self::htmlUrl($linkName);
//        echo "<br>";
        if (empty((new GetLink)->htmlUrl($linkName))) {
            return "L22";
        }
//        if (self::htmlUrl($linkName) === $request) {
//            return "L23";
//        }
        return (new GetLink)->htmlUrl($linkName);
    }
}