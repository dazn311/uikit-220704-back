<?php

use Minishlink\WebPush\VAPID;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

try {
    print_r(VAPID::createVapidKeys());
} catch (ErrorException $e) {

}
//[publicKey] => BAfNaGRIukwj_jcTkw8ymqJiWg9QOZ5wKt3famaKgNz_K5g583NVDD6y1FVKUv00iaaCiNkr4VZ4OE3ecmDz9ro
//[privateKey] => 44ak5rjCth13DvU3C0F-JPKhufc11C3c3Hc7U0en9R8

//{"endpoint":"https://fcm.googleapis.com/fcm/send/fqwFnwiv72g:APA91bHgkz-Np3LvfLuzV2V9sla5BflUKe819GTOy00nB7uwH0I3Y5T3z2J0lQIQTuKYGv_FR9vNRef2Yr_2X2TCFLTlDn_c-mSCczIwaAWPpCFNzn7cfFgD31V5xpCMobj6pfkwq0wN","expirationTime":null,"keys":{"p256dh":"BMxnecQgY1oioELYfsCIiAuGpRUex-igWWe0S9Db3q7-YSGRmJKOxWWAge-2jJgg8e5C1b5SQndJKgc1z1TwirM","auth":"3FvyhSQc_8LJfXakyTJyew"}}