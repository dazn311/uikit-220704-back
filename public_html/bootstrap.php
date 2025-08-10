<?php

$container = new \Utils\ServiceContainer();
$container->setService(\Utils\Db::class, function () {
    $db_config = require CONFIG . '/db.php';
    return (\Utils\Db::getInstance())->getConnection($db_config);
});

\Utils\App::setContainer($container);
