<?php
/*
 * sendPushMessage
 * */
require_once dirname(__FILE__) . '/../../vendor/autoload.php';
use Minishlink\WebPush\WebPush;

$auth = [
    'VAPID' => [
        'subject' => 'mailto:me@website.com', // can be a mailto: or your website address
        'publicKey' => '~88 chars', // (recommended) uncompressed public key P-256 encoded in Base64-URL
        'privateKey' => '~44 chars', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
    ],
];

try {
    $webPush = new WebPush($auth);
} catch (ErrorException $e) {

}