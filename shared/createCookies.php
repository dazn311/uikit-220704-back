<?php
$arr_cookie_options = array (
                'expires' => time() + 60*60*24*30, 
                'path' => '/', 
                'domain' => 'localhost', // leading dot for compatibility or use subdomain
                'secure' => true,     // or false
                'httponly' => true,    // or false
                'samesite' => 'None' // None || Lax  || Strict
                );
setcookie('AuthSSO', '00777', $arr_cookie_options); 

setcookie('daz', 'forLocal', time() + (86400 * 30), '/', 'localhost', false, false);
setcookie('daz22', 'cislink', time() + (86400 * 30), '/', '.cislink.moscow', false, false);