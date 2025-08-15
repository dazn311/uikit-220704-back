<?php

use Minishlink\WebPush\VAPID;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

try {
    print_r(VAPID::createVapidKeys());
} catch (ErrorException $e) {

}
//[publicKey] => BAfNaGRIukwj_jcTkw8ymqJiWg9QOZ5wKt3famaKgNz_K5g583NVDD6y1FVKUv00iaaCiNkr4VZ4OE3ecmDz9ro
//[privateKey] => 44ak5rjCth13DvU3C0F-JPKhufc11C3c3Hc7U0en9R8